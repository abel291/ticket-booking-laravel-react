<?php

namespace App\Http\Controllers\Payment;

use App\Enums\PaymentStatus;
use App\Helpers\Checkout;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Event;
use App\Models\Payment;
use App\Services\CheckoutService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
	public function payment(PaymentRequest $request)
	{
		$event = $event = Event::where('slug', $request->event_slug)
			->has('sessions_available')
			->with('sessions_available.ticket_types_available', 'promotions_available', 'location')
			->firstOrFail();

		$session_selected = $event->sessions_available->firstWhere('date', $request->date);

		$tickets = $session_selected->ticket_types_available;

		$promotion_selected = $event->promotions_available->firstWhere('code', $request->code_promotion);

		$tickets_selected = CheckoutService::tickets_quantity_selected(
			$tickets,
			$request->input('tickets_quantity', [])
		);

		$summary = CheckoutService::summary(
			sub_total: $tickets_selected->sum('price_quantity'),
			promotion_selected: $promotion_selected
		);

		$payment = new Payment();
		$payment->code = rand(1000, 9999) . date('md') . auth()->user()->id;
		$payment->session = $session_selected->date;
		$payment->quantity = $tickets_selected->sum('quantity_selected');
		$payment->status = PaymentStatus::SUCCESSFUL;

		//amount
		$payment->fee = $summary['fee'];
		$payment->fee_porcent = $summary['fee_porcent'];
		$payment->sub_total = $summary['sub_total'];
		$payment->total = $summary['total'];

		//json
		$payment->event_data = [
			'title' => $event->title,
			'location_address' => $event->location->address,
			'location_name' => $event->location->name,
		];
		$payment->user_data = ['name' => $request->name, 'phone' => $request->phone, 'email' => auth()->user()->email];

		//relationships
		$payment->event_id = $event->id;
		$payment->session_id = $session_selected->id;
		$payment->user_id = auth()->user()->id;
		if ($promotion_selected) {
			$payment->promotion_data = $promotion_selected->only('value', 'type', 'code');
			$payment->promotion_id = $promotion_selected->id;
		}
		try {
			if ($payment->total > 0) {

				// $description_stripe = $user->name . " - " . $payment->quantity . " boleto(s)";
				// $stripe = new Stripe\StripeClient(env('STRIPE_SECRET'));
				// $pay = $stripe->paymentIntents->create([
				//     'amount' => $payment->total * 100,
				//     'currency' => 'usd',
				//     'description' => $description_stripe,
				//     'payment_method' => $paymentMethod,
				//     'confirmation_method' => 'manual',
				//     'confirm' => true,
				// ]);

				// $payment->stripe_id = $pay->id;

				$payment->stripe_id = Str::random();
			} else {
				$payment->stripe_id = '';
			}

			$payment->save();

			$tickets_payments = [];
			foreach ($tickets_selected as $key => $item) {
				$tickets_payments[$key] = [
					'name' => $item->name,
					'price' => $item->price,
					'quantity' => $item->quantity_selected,
					'price_quantity' => $item->price_quantity,
					'ticket_type_id' => $item->id,
				];
			}

			$payment->tickets()->createMany($tickets_payments);

			DB::commit();
		} catch (\Throwable $e) {
			dd($e);
			DB::rollBack();

			return back()->withErrors(['message' => 'Al parecer hubo un error! El pago a través de su targeta no se pudo realizar.']);
		}

		return Redirect::route('profile.order_details', ['code' => $payment->code])
			->with(
				'success',
				'Orden completada con exito'
			);
	}
}

/*DB::beginTransaction();
$user = new User;
$user->username = "user";
if($user->save())
    DB::commit();
else
    DB::rollback(); */
