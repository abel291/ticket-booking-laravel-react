<?php

namespace App\Http\Controllers\Payment;

use App\Helpers\Checkout;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Http\Resources\SessionResource;
use App\Http\Resources\TicketPaymentResource;

use App\Http\Resources\TicketTypeResource;
use App\Models\Event;
use App\Models\Session;
use App\Models\TicketType;
use App\Services\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CheckoutController extends Controller
{
	public function checkout(Event $event, Request $request)
	{
		//dd($event);

		$event->load('sessions_available', 'sessions_available.ticket_types_available');

		if ($event->sessions_available->isEmpty()) {
			return back()->withErrors(['message' => "Este evento no tiene fechas disponibles"]);
		}

		// if ($request->code_promotion) {
		// 	$promotion_selected = $event->promotions_available->firstWhere('code', $request->code_promotion);
		// } else {
		// 	$promotion_selected = null;
		// }

		// $tickets_selected = CheckoutService::tickets_quantity_selected(
		// 	$tickets,
		// 	$request->input('tickets_quantity', [])
		// );

		// $summary = CheckoutService::summary(
		// 	sub_total: $tickets_selected->sum('price_quantity'),
		// );

		return Inertia::render('Checkout/Checkout', [
			'event' => new EventResource($event),
			'sessions_available' => SessionResource::collection($event->sessions_available),
			'fee_porcent' => config('fee.event')
			//'filters' => $request->only('date', 'tickets_quantity', 'code_promotion'),
			//'summary' => $summary,
			//'tickets_selected' => TicketPaymentResource::collection($tickets_selected),
			//'promotions' => $event->promotions_available, //temporal
		]);
	}

	public function checkout_method_payment(Event $event, Request $request)
	{

		$event->load('sessions_available', 'sessions_available.ticket_types_available');

		if ($event->sessions_available->isEmpty()) {
			return Redirect::route('slug', ['slug' => $event->slug])
				->withErrors(['message' => "Este evento no tiene fechas disponibles"]);
		}

		$session_selected = $event->sessions_available->firstWhere('date', $request->session_selected);	

		$tickets = $session_selected->ticket_types_available;

		
		if ($request->code_promotion) {
			$promotion_selected = $event->promotions_available->firstWhere('code', $request->code_promotion);
		} else {
			$promotion_selected = null;
		}

		$tickets_selected = CheckoutService::tickets_quantity_selected(
			$tickets,
			$request->input('tickets_selected', [])
		);

		$summary = CheckoutService::summary(
			sub_total: $tickets_selected->sum('price_quantity'),
			promotion_selected: $promotion_selected
		);
		
		return Inertia::render('Checkout/MethodPayment', [
			'event' => new EventResource($event),
			'session_selected' => $request->session_selecte,
			'promotion_selected' => $promotion_selected,
			'tickets_selected' => TicketTypeResource::collection($tickets_selected),
			'summary' => $summary,

		]);
	}

	
}
