<?php

namespace Database\Seeders;

use App\Enums\PaymentStatus;
use App\Helpers\Checkout;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Ticket;
use App\Models\User;
use Faker;
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
		Ticket::truncate();
		$events = Event::with(['sessions_available.ticket_types_available', 'promotions_available'])->get();
		$user = User::where('email', 'user2@user.com')->first();
		//dd($user->id);
		$faker = Faker\Factory::create();

		foreach ($events as $event) {
			for ($i = 0; $i < 50; $i++) {
				# code...

				$session = $event->sessions_available->random();

				$tickets = $session->ticket_types_available;

				// for ($i = 0; $i < rand(1, 2); $i++) {
				// 	$tickets_quantity[$tickets->random()->id] = rand(1, 10);
				// }
				$tickets_quantity=[];
				$tickets_quantity[$tickets->random()->id] = rand(1, 10);

				$tickets_selected = Checkout::tickets_quantity_selected(
					$tickets,
					$tickets_quantity
				);
				
				$promotion = $event->promotions_available->random();

				$summary = Checkout::summary($tickets_selected, $promotion);

				$payment = new Payment();
				$payment->code = rand(1000, 9999) . date('md') . $user->id;
				$payment->session = $session->date;
				$payment->quantity = $tickets_selected->sum('quantity_selected');
				$payment->status = PaymentStatus::SUCCESSFUL;

				//amount
				$payment->fee = $summary['fee'];
				$payment->fee_porcent = $summary['fee_porcent'];
				$payment->sub_total = $summary['sub_total'];
				$payment->total = $summary['total'];

				//json
				$payment->promotion_data = $summary['promotion'];
				$payment->event_data = [
					'title' => $event->title,
					'duration' => $event->duration,
					'location_address' => $event->location->address,
					'location_name' => $event->location->name,
				];
				$payment->user_data = ['name' => $faker->name(), 'phone' => $faker->phoneNumber(), 'email' => $user->email];

				//relationships
				$payment->event_id = $event->id;
				$payment->session_id = $session->id;
				$payment->user_id = $user->id;
				$payment->stripe_id = Str::random();
				$payment->promotion_id = $promotion->id;
				$payment->save();

				$tickets = [];
				foreach ($tickets_selected as $key => $item) {
					$tickets[$key] = [
						'name' => $item->name,
						'price' => $item->price,
						'quantity' => $item->quantity_selected,
						'total' => $item->price_quantity,
						'ticket_type_id' => $item->id,
					];
				}
				
				$payment->tickets()->createMany($tickets);
			}
		}
	}
}
