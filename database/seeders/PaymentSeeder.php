<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Payment;
use App\Models\PaymentTicketTypeDate;
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
        PaymentTicketTypeDate::truncate();
        $events = Event::with(['ticket_types.event_dates', 'location'])->get()->random(2);
        foreach ($events as $event) {
            $total_price = 0;
            $total_quantity = 0;

            foreach ($event->ticket_types as  $ticket_type) {
                $payment_ticket_type_date = [];

                $dates_count = $ticket_type->event_dates->count();
                $dates = $ticket_type->event_dates->random(rand(1, $dates_count));

                foreach ($dates as  $key => $date) {
                    $quantity = rand(1, 10);
                    $price_ticket_type_quantity = $ticket_type->price * $quantity;

                    $payment_ticket_type_date[$key] = new PaymentTicketTypeDate([
                        'quantity' => $quantity,
                        'total_price' => $price_ticket_type_quantity,
                        'date' => $date->only(['date', 'time']),
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
                ]);
                $payment->ticket_type_dates()->saveMany($payment_ticket_type_date);
            }
        }
    }
}
