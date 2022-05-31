<?php

namespace App\Http\Controllers\Payment;

use App\Helpers\Checkout;
use App\Http\Controllers\Controller;
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
    public function payment(Request $request)
    {

        $request->validate([
            'event_slug' => ['required', Rule::exists('events', 'slug')->where(function ($query) {
                return $query->where('active', true)->where('slug', request()->slug);
            }),],
            'date' => ['date', 'required', 'after:now'],
            'tickets_quantity' => ['required', 'array'],
            'name' => ['required', 'max:255', 'min:3'],
            'phone' => ['required', 'max:20', 'min:3'],

        ]);

        $event = Event::query();

        $event->where('slug', $request->event_slug);

        $event->with(['sessions' => function ($session) use ($request) {
            $session->where('date', $request->date)
                ->with(['ticket_types' => function ($ticket) use ($request) {
                    $ticket
                        ->whereIn('ticket_type_id', array_keys($request->tickets_quantity))
                        ->wherePivot('remaining', '>', 0);
                }]);
        }]);


        if ($request->code_promotion) {
            $event->with(['promotions_available' => function ($query) use ($request) {
                $query->where('code', $request->code_promotion);
            }]);
        }

        $event = $event->first();
        $promotion = $event->promotions_available->first();
        $session_selected = $event->sessions->first();

        if (!$session_selected) {
            return back()->withErrors(['message' => 'La Fecha selecionada no esta disponibles']);
        }

        $tickets = $session_selected->ticket_types;
        if ($tickets->isEmpty()) {
            return back()->withErrors([
                'message' => 'Los Boletos selecionados no estan disponibles'
            ]);
        }
        $tickets_selected = Checkout::tickets_quantity_selected($tickets, $request->tickets_quantity);
        $summary = Checkout::summary($tickets_selected, $promotion);


        $payment = new Payment();
        $user = auth()->user();
        $payment->user()->associate($user->id);
        $payment->code = rand(1000, 9999) . date('md') . $user->id;
        $payment->session = $session_selected->date;
        $payment->quantity = $summary['ticket_selected']->sum('quantity_selected');
        $payment->event_data = $event->only('name', 'duration');
        $payment->user_data = [
            'name' => $request->name,
            'phone' => $request->phone,
        ];
        $payment->fee = $summary['fee'];
        $payment->fee_porcent = $summary['fee_porcent'];
        $payment->promotion_data = $payment['promotion'];
        $payment->sub_total = $summary['sub_total'];
        $payment->total = $summary['total'];        

        try {

            $description_stripe = $user->name . " - " . $payment->quantity . " boleto(s)";
            //if (env('APP_ENV') != "testing") {
            if (env('APP_ENV') != "local") {
                $stripe = new Stripe\StripeClient(env('STRIPE_SECRET'));
                $payment = $stripe->paymentIntents->create([
                    'amount' => $payment->total * 100,
                    'currency' => 'usd',
                    'description' => $description_stripe,
                    'payment_method' => $request->paymentMethod,
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                ]);
                $payment->stripe_id = $payment->id;
            } else {
                $payment->stripe_id = Str::random();
            }
            $payment->stripe_id = Str::random();
            $payment->save();

            foreach ($tickets_selected as $value) {
                $payment->tickets()->attach($value->id, [
                    'name' => $value->name,
                    'price' => $value->price,
                    'quantity' => $value->quantity_selected,
                    'total' => $value->price_quantity,
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->withErrors(['message' => 'Al parecer hubo un error! El pago a través de su targeta no se pudo realizar.']);
        }
        dd($payment);
        return Redirect::route('order_details', [$payment->code])->with(
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
