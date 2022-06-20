<?php

namespace App\Helpers;

use App\Enums\PaymentStatus;
use App\Enums\PromotionType;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Session;
use App\Models\TicketType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Stripe;
use Illuminate\Support\Str;

class Checkout
{

    public static function event_with_data(
        $slug,
        //string $date,
        //array $tickets_selected,
        //string $code_promotion
    ) {

        $event = Event::where('slug', $slug)->has('session')
            ->with('sessions.ticket_types_available', 'promotions_available', 'location')
            ->firstOrFail();

        return $event;
        // $event->with(
        //     [
        //         'sessions' => function ($session) use ($date, $tickets_selected) {

        //             $session->where('date', $date)

        //                 ->with(['ticket_types' => function ($ticket) use ($tickets_selected) {
        //                     $ticket
        //                         ->whereIn('ticket_type_id', array_keys($tickets_selected))
        //                         ->wherePivot('remaining', '>', 0);
        //                 }]);
        //         }
        //     ],
        //     [
        //         'promotions_available' => function ($data) use ($code_promotion) {
        //             $data->where('code', $code_promotion);
        //         }
        //     ]
        // );


        // $event = $event->firstOrFail();
        // $promotion = $event->promotions_available->first();

        // $session_selected = $event->sessions->firstWhere('date', $request->date);
        // if (!$session_selected) {
        //     return 'La Fecha selecionada no esta disponibles';
        // }

        // $tickets = $session_selected->ticket_types_available;
        // if ($tickets->isEmpty()) {
        //     return back()->withErrors([
        //         'payment' => 'Los Boletos selecionados no estan disponibles'
        //     ]);
        // }

        return $event;
    }

    public static function summary(object $ticket_selected, $promotion = null)
    {

        $sub_total = $ticket_selected->sum('price_quantity');

        $fee = $sub_total * config('fee.event');

        $total = $sub_total + $fee;

        if ($promotion && $ticket_selected->isNotEmpty()) {
            if ($promotion->type == PromotionType::AMOUNT->value) {

                $promotion->applied = $promotion->value;
            } elseif ($promotion->type == PromotionType::PERCENT->value) {

                $promotion->applied = $total * ($promotion->value / 100);
            }

            if ($total < $promotion->applied) {
                $promotion->applied = $total;
                $total = 0;
            } else {
                $total -= $promotion->applied;
            }
            $promotion = $promotion->only('code', 'value', 'type', 'applied');
        } else {
            $promotion = null;
        }


        $summary = [
            'sub_total' => $sub_total,
            'fee_porcent' => config('fee.event'),
            'fee' => $fee,
            'promotion' => $promotion,
            'total' => $total,
            'ticket_selected' => $ticket_selected->values(),
        ];

        return $summary;
    }

    public static function tickets_quantity_selected(object $tickets, $tickets_quantity)
    {
        if ($tickets_quantity) {

            $tickets_quantity = array_filter($tickets_quantity);
            $array_ids_tickets_selected = array_keys($tickets_quantity);
            $tickets_selected = $tickets
                ->whereIn('id', $array_ids_tickets_selected)
                ->map(function ($item) use ($tickets_quantity) {
                    $item->quantity_selected = $tickets_quantity[$item->id];
                    $item->price_quantity = $item->quantity_selected * $item->price;
                    return $item;
                });
            return $tickets_selected;
        } else {
            return collect([]);
        }
    }

    public static function process_payment(
        $session_selected,
        $tickets_selected,
        $summary,
        $event,
        $promotion,
        $user,
        $name,
        $phone,
        $paymentMethod

    ) {
        $payment = new Payment();
        $payment->code = rand(1000, 9999) . date('md') . $user->id;
        $payment->session = $session_selected->date;
        $payment->quantity = $tickets_selected->sum('quantity_selected');
        $payment->status = PaymentStatus::SUCCESSFUL;

        //amount
        $payment->fee = $summary['fee'];
        $payment->fee_porcent = $summary['fee_porcent'];
        $payment->sub_total = $summary['sub_total'];
        $payment->total = $summary['total'];

        //json
        $payment->promotion_data = $summary['promotion'];
        $payment->event_data = [
            'title' => $event->title,
            'duration' => $event->duration,
            'location_address' => $event->location->address,
            'location_name' => $event->location->name
        ];
        $payment->user_data = ['name' => $name, 'phone' => $phone, 'email' => $user->email];

        //relationships
        $payment->event_id = $event->id;
        $payment->session_id = $session_selected->id;
        $payment->user_id = $user->id;
        if ($promotion) {
            $payment->promotion_id = $promotion->id;
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
                $payment->stripe_id = "";
            }

            $payment->save();

            $tickets = [];
            foreach ($tickets_selected as $key => $item) {
                $tickets[$key] = [
                    'name' => $item->name,
                    'price' => $item->price,
                    'quantity' => $item->quantity_selected,
                    'total' => $item->price_quantity,
                    'ticket_type_id' => $item->id,
                ];
            }
            $payment->tickets()->createMany($tickets);


            DB::commit();
        } catch (\Throwable $e) {
            dd($e);
            DB::rollBack();

            return 'Al parecer hubo un error! El pago a través de su targeta no se pudo realizar.';
        }

        return $payment;
    }

    public static function calculate_amount_refund($payment)
    {
        //Politicas de cancelacion

        // Cancelaciones 15 días naturales previos al evento se reembolsará el 100% del importe de inscripción, excepto los gastos de gestión que pudiera ocasionar.

        // Cancelaciones entre 15 y 3 días naturales previos al evento se reembolsará el 50% del importe de inscripción, excepto los gastos de gestión que pudiera ocasionar.

        // Cancelaciones con menos de 3 días naturales de anticipación no dará derecho a devolución alguna.

        $days = $payment->session->diffInDays(Carbon::now());

        if ($days >= 15) {

            $porcent_refund = 1; //100%

        } elseif ($days <= 15 && $days >= 3) {

            $porcent_refund = 0.5; //50%

        } else {

            $porcent_refund = 0; //0%

        }

        $amount_refund = ($payment->total - $payment->fee) * $porcent_refund;
        return [
            $days,
            $porcent_refund,
            $amount_refund,
        ];
    }
    public static function refund($payment, $amount_refund, $days, $porcent_refund)
    {

        // $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        // $stripe->refunds->create(
        //     [
        //         'payment_intent' => $payment->stripe_id,
        //         'amount' => $amount_refund * 100,
        //         'metadata' => [
        //             'order_code' => $payment->code,
        //             'days' => $days,
        //             'porcent' => ($porcent_refund * 100) . "%"
        //         ]
        //     ]
        // );
    }
}
