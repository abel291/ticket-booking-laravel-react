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
        $events = Event::with(['sessions_available.ticket_types_available', 'promotions_available'])->get();
        $user = User::where('email', 'user2@user.com')->first();
        //dd($user->id);
        $faker = Faker\Factory::create();

        foreach ($events as $event) {
            $session = $event->sessions_available->random();

            $tickets = $session->ticket_types_available;

            for ($i = 0; $i < rand(1, 20); $i++) {
                $tickets_quantity[$tickets->random()->id] = rand(1, 10);
            }

            $tickets_selected = Checkout::tickets_quantity_selected(
                $tickets,
                $tickets_quantity
            );
            $promotion = $event->promotions_available->random();

            $summary = Checkout::summary($tickets_selected, $promotion);

            $payment = Checkout::process_payment(
                session_selected: $session,
                tickets_selected: $tickets_selected,
                summary: $summary,
                event: $event,
                promotion: $promotion,
                user: $user,
                name: $faker->name(),
                phone: $faker->phoneNumber(),
                paymentMethod: Str::random()
            );
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
