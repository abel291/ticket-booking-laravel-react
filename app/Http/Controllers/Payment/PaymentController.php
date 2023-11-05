<?php

namespace App\Http\Controllers\Payment;

use App\Enums\OrderStatus;
use App\Helpers\Checkout;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Event;
use App\Models\Order;
use App\Models\Payment;
use App\Services\CheckoutService;
use App\Services\OrderService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
	public function payment(PaymentRequest $request)
	{

		$event = $event = Event::with('sessions_available.ticket_types_available', 'promotions', 'location')
			->findOrFail($request->event_id);

		$session_selected = $event->sessions_available->firstWhere('date', $request->date);

		$tickets = $session_selected->ticket_types_available;

		if ($request->code_promotion) {
			$promotion = $event->promotions_available()->active()->where('code', $request->code_promotion)->firstOrFail();
		} else {
			$promotion = null;
		}

		$tickets_selected = OrderService::calculatePriceTicket(
			$tickets,
			$request->input('tickets_quantity', [])
		);

		$order = OrderService::createOrder($event, $session_selected, $tickets_selected, $promotion);

		$order->data = array_merge(
			(array)$order->data,
			[
				'user' => [
					'name' => $request->name,
					'phone' => $request->phone,
					'email' => auth()->user()->email
				]
			]
		);

		try {
			if ($order->total > 0) {

				// $description_stripe = $user->name . " - " . $order->quantity . " boleto(s)";
				// $stripe = new Stripe\StripeClient(env('STRIPE_SECRET'));
				// $pay = $stripe->paymentIntents->create([
				//     'amount' => $order->total * 100,
				//     'currency' => 'usd',
				//     'description' => $description_stripe,
				//     'payment_method' => $orderMethod,
				//     'confirmation_method' => 'manual',
				//     'confirm' => true,
				// ]);

				// $order->stripe_id = $pay->id;

				$order->stripe_id = Str::random();
			} else {
				$order->stripe_id = '';
			}
			$order->status = OrderStatus::SUCCESSFUL;
			$order->save();

			$tickets_payments = [];
			foreach ($tickets_selected as $key => $item) {
				$tickets_payments[$key] = [
					'name' => $item->name,
					'price' => $item->price,
					'quantity' => $item->quantity_selected,
					'total' => $item->price_quantity,
					'ticket_type_id' => $item->id,
					'event_id' => $event->id,
					'user_id' => auth()->user()->id,
				];
			}

			$order->order_tickets()->createMany($tickets_payments);

			DB::commit();
		} catch (\Throwable $e) {
			dd($e);
			DB::rollBack();

			return back()->withErrors(['message' => 'Al parecer hubo un error! El pago a través de su targeta no se pudo realizar.']);
		}

		return Redirect::route('profile.order_details', ['code' => $order->code])
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
