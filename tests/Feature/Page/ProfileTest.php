<?php

namespace Tests\Feature\Page;

use App\Models\Event;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Stripe\Order;
use Tests\TestCase;

class ProfileTest extends TestCase
{
	public function test_page_my_account()
	{
		$user = User::get()->random();

		$response = $this->actingAs($user)->get(route('profile.my_account'));

		$response->assertStatus(200);
	}
	public function test_page_account_details()
	{
		$user = User::get()->first();

		$response = $this->actingAs($user)->get(route('profile.account_details'));

		$response->assertStatus(200);
	}
	public function test_page_store_account_details()
	{
		$this->withoutExceptionHandling();
		$new_user = User::factory()->create()->only('name', 'email', 'phone');

		$new_user['email'] = "user@user" . rand(0, 1000) . '.com';

		$new_user['email_confirmation'] = $new_user['email'];
		//dd($new_user);
		$user = User::first();

		$response = $this->actingAs($user)->post(route('profile.store_account_details', $new_user));

		$response->assertStatus(302);
	}

	public function test_page_my_orders()
	{
		$user = User::get()->random();
		$response = $this->actingAs($user)->get(route('profile.my_orders'));

		$response->assertStatus(200);
	}

	public function test_page_order_details()
	{
		$payment = Payment::get()->random();

		$user = $payment->user;

		$response = $this->actingAs($user)->get(route('profile.order_details', $payment->code));

		$response->assertStatus(200);
	}
	
	public function test_page_cancel_order()
	{
		$payment = Payment::get()->random();

		$user = $payment->user;

		$response = $this->actingAs($user)->get(route('profile.cancel_order', $payment->code));

		$response->assertStatus(200);
	}
	
	public function test_page_store_cancel_order()
	{
		$payment = Payment::get()->random();

		$user = $payment->user;

		$response = $this->actingAs($user)->post(route('profile.store_cancel_order', ['code' => $payment->code]));

		$response->assertStatus(302);
	}
}
