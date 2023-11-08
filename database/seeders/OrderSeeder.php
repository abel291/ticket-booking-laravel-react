<?php

namespace Database\Seeders;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Helpers\Checkout;
use App\Models\Event;
use App\Models\Order;
use App\Models\OrderTicket;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\User;
use App\Services\CheckoutService;
use App\Services\OrderService;
use Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Order::truncate();
        OrderTicket::truncate();

        $events = Event::with(['sessions.ticket_types', 'promotions'])->get();
        $users = User::get();
        $faker = Faker\Factory::create();
        foreach ($users as $user) {
            foreach ($events as $key => $event) {

                $session_selected = $event->sessions_available->random();

                $tickets = $session_selected->ticket_types_available;
                $tickets_quantity = [];
                foreach ($tickets as $key => $ticket_selected) {

                    $ticket_sold = $ticket_selected->pivot->sales;

                    $ticket_remaining = $ticket_selected->quantity - $ticket_sold;

                    $ticket_quantity_selected = rand(1, 5);

                    if ($ticket_remaining < $ticket_quantity_selected) {
                        break;
                        break;
                    }
                    echo $ticket_selected->quantity . "-" . $ticket_quantity_selected . "-" . $ticket_sold . "\n";

                    $tickets_quantity[$ticket_selected->id] = rand(1, $ticket_quantity_selected);
                }

                $tickets_selected = OrderService::calculatePriceTicket(
                    $tickets,
                    $tickets_quantity
                );

                $order = OrderService::createOrder($event, $session_selected, $tickets_selected);

                $order->data = array_merge(
                    (array)$order->data,
                    [
                        'user' => [
                            'name' => $user->name,
                            'phone' => $user->phone,
                            'email' => $user->email
                        ]
                    ]
                );
                $order->stripe_id = Str::random();
                $order->status = $faker->randomElement([OrderStatus::SUCCESSFUL, OrderStatus::REFUNDED, OrderStatus::CANCELED]);
                $order->save();

                $order_tickets = [];
                foreach ($tickets_selected as $key => $item) {
                    $order_tickets[$key] = [
                        'name' => $item->name,
                        'price' => $item->price,
                        'quantity' => $item->quantity_selected,
                        'total' => $item->price_quantity,
                        'ticket_type_id' => $item->id,
                        //'session_id' => $order->session_id,
                        'event_id' => $event->id,
                        'user_id' => $user->id,
                    ];
                }

                $order->order_tickets()->createMany($order_tickets);
            }
        }
        Schema::enableForeignKeyConstraints();
    }
}
