<?php

namespace Database\Seeders;

use App\Enums\PaymentStatus;
use App\Models\Event;
use App\Models\Payment;
<<<<<<< HEAD

use App\Models\PaymentTicketTypeSession;
=======
use App\Models\PaymentTicketType;
>>>>>>> dashboard-tailwind
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
<<<<<<< HEAD
        PaymentTicketTypeSession::truncate();
        $user=User::get();
        $events = Event::with(['ticket_types.sessions', 'location'])->get();
=======
        PaymentTicketType::truncate();
        $user = User::get();
        $faker = Faker\Factory::create();
        $events = Event::with(['ticket_types', 'sessions', 'location'])->get();
>>>>>>> dashboard-tailwind
        foreach ($events as $event) {
            $total_price = 0;
            $total_quantity = 0;

            foreach ($event->ticket_types as  $ticket_type) {
<<<<<<< HEAD
                $payment_ticket_type_sessions = [];

                $session_count = $ticket_type->sessions->count();
                $sessions = $ticket_type->sessions->random(rand(1, $session_count));
=======
                $payment_ticket_types = [];

                $sessions_count = $event->sessions->count();
                $sessions = $event->sessions->random(rand(1, $sessions_count));
>>>>>>> dashboard-tailwind

                foreach ($sessions as  $key => $session) {
                    $quantity = rand(1, 10);
                    $price_ticket_type_quantity = $ticket_type->price * $quantity;

<<<<<<< HEAD
                    $payment_ticket_type_sessions[$key] = new PaymentTicketTypeSession([
                        'quantity' => $quantity,
                        'total_price' => $price_ticket_type_quantity,
                        'session' => $session->only(['date', 'time']),
                        'ticket_type' => $ticket_type->only(['price', 'name']),
=======
                    $payment_ticket_types[$key] = new PaymentTicketType([
                        'quantity' => $quantity,
                        'total_price' => $price_ticket_type_quantity,
                        'session' => $session->only(['date', 'time']),
                        'ticket_type' => $ticket_type->only(['name', 'price', 'type']),
>>>>>>> dashboard-tailwind
                    ]);

                    $total_price += $price_ticket_type_quantity;
                    $total_quantity += $quantity;
                }

                $payment = Payment::create([
                    'code' => Str::random(8),
                    'event' => $event->only(['name', 'duration', 'address', 'location.name']),
                    'type' => $faker->randomElement([
                        PaymentStatus::SUCCESSFUL->value,
                        PaymentStatus::CANCELED->value,
                        PaymentStatus::REFUNDED->value,
                    ]),
                    'total_quantity' => $total_quantity,
                    'total_price' => $total_price,
                    'event_id' => $event->id,
                    'user_id' => $user->random()->id,
                    'user' => $user->random()->only(['name', 'phone', 'email']),
                ]);
<<<<<<< HEAD
                $payment->ticket_type_sessions()->saveMany($payment_ticket_type_sessions);
=======

                $payment->ticket_types()->saveMany($payment_ticket_types);
>>>>>>> dashboard-tailwind
            }
        }
    }
}
