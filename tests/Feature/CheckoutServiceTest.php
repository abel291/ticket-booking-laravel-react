<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckoutServiceTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function test_page_checkout()
	{
		$user = User::get()->first();
		$event = Event::active()->get()->random();
		$response = $this->withoutExceptionHandling()->actingAs($user)->get(route('checkout', $event->slug));

		$response->assertStatus(200);
	}
	public function test_page_checkout_add_date_and_tickets_types()
	{
		$user = User::get()->first();
		$event = Event::active()
			->with('sessions_available', 'sessions_available.ticket_types_available')
			->get()
			->random();

		$session = $event->sessions_available->random();
		$tickets = $session->ticket_types_available;

		$tickets_quantity = [];
		$tickets_quantity[$tickets->random()->id] = rand(1, 10);

		$query = http_build_query([
			'date' => $session->date->format('Y-m-d H:i:s'),
			'tickets_quantity' => $tickets_quantity,
			'code_promotion' => $event->promotions_available->first()
		]);

		$response = $this->withoutExceptionHandling()->actingAs($user)
			->get("checkout/$event->slug?$query");

		$response->assertStatus(200);
	}
	
}
