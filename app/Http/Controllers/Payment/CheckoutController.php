<?php

namespace App\Http\Controllers\Payment;

use App\Helpers\Checkout;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Http\Resources\SessionResource;
use App\Http\Resources\TicketPaymentResource;

use App\Http\Resources\TicketTypeResource;
use App\Models\Event;
use App\Models\Promotion;
use App\Models\Session;
use App\Services\CheckoutService;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function checkout($slug, Request $request)
    {
        $event = Event::select('id', 'title', 'thum', 'slug', 'banner', 'location_id')
            ->with('location:id,address', 'sessions_available.ticket_types_available')
            ->where('slug', $slug)->firstOrFail();

        // if ($event->sessions->isEmpty()) {
        //     return back()->withErrors(['message' => "Este evento no tiene fechas disponibles"]);
        // }

        if ($request->date) {
            $session_selected = $event->sessions_available->firstWhere('date', $request->date);
        } else {
            $session_selected = $event->sessions_available->first();
        }

        $tickets = $session_selected->ticket_types_available;

        $tickets_selected = OrderService::calculatePriceTicket(
            $tickets,
            $request->input('tickets_quantity', [])
        );

        if ($request->code_promotion) {
            $promotion = $event->promotions_available()->active()->where('code', $request->code_promotion)->firstOrFail();
        } else {
            $promotion = null;
        }

        $order = OrderService::calculateTotal(
            tickets_selected: $tickets_selected,
            promotion: $promotion
        );

        $sessions = $event->sessions_available;
        return Inertia::render('Checkout/Checkout', [
            'event' => $event->only(['id', 'title', 'thum', 'slug', 'banner', 'location']),
            'sessions' => SessionResource::collection($sessions),
            'tickets' => $tickets,
            'filters' => $request->only('date', 'tickets_quantity', 'code_promotion'),
            'order' => $order,
            'tickets_selected' => $tickets_selected,
            'session_selected' => new SessionResource($session_selected),
            'promotions' => $event->promotions_available, //temporal
        ]);
    }
}
