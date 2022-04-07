<?php

namespace Database\Seeders;

use App\Enums\PaymentStatus;
use App\Enums\PromotionType;
use App\Models\Event;
use App\Models\Payment;
use App\Models\PaymentTicketType;
use App\Models\Promotion;
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
        PaymentTicketType::truncate();
        $user = User::get();
        $faker = Faker\Factory::create();
        $events = Event::with(['ticket_types', 'sessions', 'location', 'promotions'])->get();
        foreach ($events as $event) {


            $total_quantity = 0;
            $sub_total = 0;
            $total = 0;


            foreach ($event->ticket_types as  $ticket_type) {
                $payment_ticket_types = [];
                $sessions_count = $event->sessions->count();
                $sessions = $event->sessions->random(rand(1, $sessions_count));

                foreach ($sessions as  $key => $session) {
                    $quantity = rand(1, 10);

                    $price_ticket_type_quantity = ($ticket_type->price * $quantity);

                    $payment_ticket_types[$key] = new PaymentTicketType([
                        'quantity' => $quantity,
                        'total' => $price_ticket_type_quantity,
                        'session' => $session->only(['date', 'time']),
                        'ticket_type' => $ticket_type->only(['name', 'price', 'type']),
                    ]);

                    $sub_total += $price_ticket_type_quantity;
                    $total_quantity += $quantity;
                }

                $payment = new Payment;
                $payment->code = Str::random(8);

                $payment->type = $faker->randomElement([
                    PaymentStatus::SUCCESSFUL->value,
                    PaymentStatus::CANCELED->value,
                    PaymentStatus::REFUNDED->value,
                ]);
                $payment->quantity = $total_quantity;
                $payment->sub_total = $sub_total;
                $payment->total = $sub_total;

                $payment->event_data = $event->only(['name', 'duration', 'address', 'location.name']);
                $payment->event_id = $event->id;

                $payment->user_data = $user->random()->only(['name', 'phone', 'email']);
                $payment->user_id = $user->random()->id;


                if ($event->promotions->count()) {
                    $promotion = $event->promotions->random();

                    if ($promotion->type = PromotionType::PERCENT->value) {

                        $promotion->discount =  ($sub_total * ($promotion->value / 100));

                        $payment->total =  $sub_total - $promotion->discount;
                    } else {
                        $promotion->discount =  $promotion->value;
                        $amount = $sub_total - $promotion->discount;
                        $payment->total = ($amount <= 0 ? 0 : $amount);
                    }
                    $payment->promotion_data = $promotion->only(['code', 'value', 'type', 'discount']);
                    $payment->promotion_id = $promotion->id;
                }

                $payment->save();

                $payment->ticket_types()->saveMany($payment_ticket_types);
            }
        }
    }
}
