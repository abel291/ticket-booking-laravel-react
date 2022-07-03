<?php

namespace Tests\Feature\Page;

use App\Models\Event;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Stripe\Order;
use Tests\TestCase;

class PageTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */

	public function test_page_home()
	{
		$response = $this->get('/');

		$response->assertStatus(200);
	}

	public function test_page_events()
	{
		$response = $this->get(route('events'));

		$response->assertStatus(200);
	}

	public function test_page_event()
	{
		$event = Event::get()->random();

		$response = $this->get(route('event', [$event->slug]));

		$response->assertStatus(200);
	}

	public function test_page_about_us()
	{
		$response = $this->get(route('about_us'));

		$response->assertStatus(200);
	}

	public function test_page_privacy_policy()
	{
		$response = $this->get(route('privacy_policy'));

		$response->assertStatus(200);
	}

	public function test_page_terms_of_service()
	{
		$response = $this->get(route('terms_of_service'));

		$response->assertStatus(200);
	}

	public function test_page_faq()
	{
		$response = $this->get(route('faq'));

		$response->assertStatus(200);
	}


	
}
