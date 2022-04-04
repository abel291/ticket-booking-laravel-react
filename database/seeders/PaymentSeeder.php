<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Payment;

use App\Models\PaymentTicketTypeSession;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
        PaymentTicketTypeSession::truncate();
        $user=User::get();
        $events = Event::with(['ticket_types.sessions', 'location'])->get();
        foreach ($events as $event) {
            $total_price = 0;
            $total_quantity = 0;

            foreach ($event->ticket_types as  $ticket_type) {
                $payment_ticket_type_sessions = [];

                $session_count = $ticket_type->sessions->count();
                $sessions = $ticket_type->sessions->random(rand(1, $session_count));

                foreach ($sessions as  $key => $session) {
                    $quantity = rand(1, 10);
                    $price_ticket_type_quantity = $ticket_type->price * $quantity;

                    $payment_ticket_type_sessions[$key] = new PaymentTicketTypeSession([
                        'quantity' => $quantity,
                        'total_price' => $price_ticket_type_quantity,
                        'session' => $session->only(['date', 'time']),
                        'ticket_type' => $ticket_type->only(['price', 'name']),
                    ]);

                    $total_price += $price_ticket_type_quantity;
                    $total_quantity += $quantity;
                }
                $payment = Payment::create([
                    'code' => Str::random(8),
                    'event' => $event->only(['name', 'duration', 'address', 'location.name']),
                    'total_quantity' => $total_quantity,
                    'total_price' => $total_price,
                    'event_id' => $event->id,
                    'user_id' => $user->random()->id,
                    'user' => $user->random()->only(['name', 'phone', 'email']),
                ]);
                $payment->ticket_type_sessions()->saveMany($payment_ticket_type_sessions);
            }
        }
    }
}
