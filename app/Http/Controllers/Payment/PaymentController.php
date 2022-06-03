<?php

namespace App\Http\Controllers\Payment;

use App\Helpers\Checkout;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Stripe;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function payment(PaymentRequest $request)
    {
        $event = $event = Event::where('slug', $request->event_slug)->has('session')
            ->with('sessions.ticket_types_available', 'promotions_available', 'location')
            ->firstOrFail();

        $session_selected = $event->sessions->firstWhere('date', $request->date);

        $tickets = $session_selected->ticket_types_available;

        $promotion = $event->promotions_available->firstWhere('code', $request->code_promotion);

        $tickets_selected = Checkout::tickets_quantity_selected(
            $tickets,
            $request->tickets_quantity
        );

        $summary = Checkout::summary($tickets_selected, $promotion);

        $payment = Checkout::process_payment(
            session_selected: $session_selected,
            tickets_selected: $tickets_selected,
            summary: $summary,
            event: $event,
            promotion: $promotion,
            user: auth()->user(),
            name: $request->name,
            phone: $request->phone,
            paymentMethod: $request->paymentMethod
        );
        if (is_string($payment)) {
            return back()->withErrors(['message' => $payment]);
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
