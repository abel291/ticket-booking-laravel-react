<?php

namespace App\Http\Controllers;

use App\Enums\TicketTypes;
use App\Http\Resources\EventResource;
use App\Http\Resources\SessionResource;
use App\Http\Resources\TicketTypeResource;
use App\Models\Event;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function checkout(Event $event, Request $request)
    {

        $sessions = Session::where('date', '>=', now())
            ->whereBelongsTo($event)
            ->active()
            ->with(['ticket_types' => function ($query) {
                $query->active()->wherePivot('remaining', '>', 0);
            }])->get()->sortBy('date');

        if ($request->date) {
            $session_selected = $sessions->firstWhere('date', $request->date);
        } else {
            $session_selected = $sessions->first();
            
        }
        
        $tickets = $session_selected->ticket_types;
        $summary = $this->summary_totals($tickets, $request->tickets_quantity);

        return Inertia::render('Checkout/Checkout', [
            'event' => new EventResource($event),
            'sessions' => SessionResource::collection($sessions),
            'tickets' => TicketTypeResource::collection($tickets),
            'filters' => $request->only('date', 'tickets_quantity', 'code_promotion'),
            'summary' => $summary,
        ]);
    }
    // public function payment_methods(Event $event, Request $request)
    // {
    //     //dd($request->all());

    //     $session = Session::where('date', '>=', now())
    //         ->whereBelongsTo($event)
    //         ->active()
    //         ->where('date', $request->session)
    //         ->with(['ticket_types' => function ($query) {
    //             $query->active()->wherePivot('remaining', '>', 0);
    //         }])->firstOrFail();


    //     $summary = $this->summary_totals($session->ticket_types, $request->ticket_types_selected);

    //     return Inertia::render('Checkout/PaymentMethods/PaymentMethods', [
    //         'event' => new EventResource($event),
    //         'session' => $session->date,
    //         'summary' => $summary,
    //     ]);
    // }

    public function summary_totals(object $tickets, $tickets_quantity)
    {
        //dd($tickets_quantity);
        if (is_array($tickets_quantity)) {
            $array_ids_ticket_selected = array_keys($tickets_quantity);
            $ticket_selected = $tickets->whereIn('id', $array_ids_ticket_selected)
                ->map(function ($item, $key) use ($tickets_quantity) {
                    $item->quantity_selected = $tickets_quantity[$item->id];
                    $item->price_quantity = $item->quantity_selected * $item->price;
                    return $item;
                })->filter(fn ($ticket) => $ticket->quantity_selected);
        } else {
            $ticket_selected = collect([]);
        }

        $summary['sub_total'] = $tickets->sum('price_quantity');

        $summary['fee_porcent'] = config('fee.event');

        $summary['fee'] = $summary['sub_total'] * config('fee.event');

        $summary['total'] = $summary['sub_total'] + $summary['fee'];

        $summary['ticket_selected'] = $ticket_selected->values();

        return $summary;
    }
}
