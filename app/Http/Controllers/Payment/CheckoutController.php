<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Enums\PromotionType;
use App\Enums\TicketTypes;
use App\Helpers\Checkout;
use App\Http\Resources\EventResource;
use App\Http\Resources\SessionResource;
use App\Http\Resources\TicketTypeResource;
use App\Models\Event;
use App\Models\Promotion;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Psy\VersionUpdater\Checker;

class CheckoutController extends Controller
{
    public function checkout(Event $event, Request $request)
    {   
        //dd($event);
        $sessions = Session::where('date', '>=', now())
            ->whereBelongsTo($event)            
            ->with(['ticket_types' => function ($query) {
                $query->wherePivot('remaining', '>', 0);
            }])->get()->sortBy('date');
        
            
        if ($request->date) {
            $session_selected = $sessions->firstWhere('date', $request->date);
        } else {
            $session_selected = $sessions->first();
        }
       
        $tickets = $session_selected->ticket_types;

        
        if ($request->code_promotion) {
            $promotion = $event->promotions_available->firstWhere('code', $request->code_promotion);
        }else{
            $promotion=null;
        }

        $tickets_selected=Checkout::tickets_quantity_selected($tickets, $request->tickets_quantity);
        $summary = Checkout::summary($tickets_selected, $promotion);

        return Inertia::render('Checkout/Checkout', [
            'event' => new EventResource($event),
            'sessions' => SessionResource::collection($sessions),
            'tickets' => TicketTypeResource::collection($tickets),
            'filters' => $request->only('date', 'tickets_quantity', 'code_promotion'),
            'summary' => $summary,
            'promotions' => $event->promotions_available
        ]);
    }
}
