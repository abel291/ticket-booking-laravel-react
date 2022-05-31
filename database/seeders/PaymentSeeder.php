<?php

namespace Database\Seeders;

use App\Enums\PaymentStatus;
use App\Enums\PromotionType;
use App\Helpers\Checkout;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::truncate();
        Ticket::truncate();
        $users = User::get();
        $faker = Faker\Factory::create();
        $events = Event::with(['sessions.ticket_types', 'location', 'promotions'])->get();
        foreach ($events as $event) {
            $user = $users->random();
            $session = $event->session;
            $tickets = $session->ticket_types;

            $ticket_quantity = [];
            foreach ($tickets as  $item) {
                $ticket_quantity[$item->id] = rand(1, 20);
            }
            $tickets_selected = Checkout::tickets_quantity_selected($tickets, $ticket_quantity);
            $promotion = $event->promotions->random();
            $summary = Checkout::summary($tickets_selected, $promotion);


            $payment = new Payment;
            $payment->code = rand(1000, 9999) . date('md') . $user->id;
            $payment->stripe_id = $faker->regexify('[A-Z]{5}[0-9]{3}');
            $payment->session = $session->date;
            $payment->status = $faker->randomElement([
                PaymentStatus::SUCCESSFUL,
                PaymentStatus::CANCELED,
                PaymentStatus::REFUNDED,
            ]);
            $payment->quantity = $summary['ticket_selected']->sum('quantity_selected');

            //amount
            $payment->fee = $summary['fee'];
            $payment->fee_porcent = $summary['fee_porcent'];
            $payment->sub_total = $summary['sub_total'];
            $payment->total = $summary['total'];

            //json
            $payment->promotion_data = $summary['promotion'];
            $payment->event_data = $event->only(['title', 'duration', 'location.address', 'location.name']);
            $payment->user_data = $user->only(['name', 'phone', 'email']);

            //relationships
            $payment->event_id = $event->id;
            $payment->session_id = $session->id;
            $payment->user_id = $user->id;
            $payment->promotion_id = $promotion->id;

            // foreach ($event->ticket_types as  $ticket_type) {
            //     $quantity = rand(1, 10);


            //     $price_ticket_type_quantity = ($ticket_type->price * $quantity);
            //     $new_ticket = new Ticket([
            //         'quantity' => $quantity,
            //         'total' => $price_ticket_type_quantity,
            //         'price' => $ticket_type->price,
            //         'name' => $ticket_type->name,
            //         'ticket_type_id' => $ticket_type->id,
            //     ]);
            //     array_push($tickets, $new_ticket);
            //     $sub_total += $price_ticket_type_quantity;
            //     $total_quantity += $quantity;
            // }

            $payment->save();

            foreach ($tickets_selected as $value) {
                $payment->tickets()->create([
                    'name' => $value->name,
                    'price' => $value->price,
                    'quantity' => $value->quantity_selected,
                    'total' => $value->price_quantity,
                    'ticket_type_id' => $value->id,
                ]);
            }
        }
    }
}
