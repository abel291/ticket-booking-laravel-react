<?php

namespace App\Helpers;

use App\Enums\PaymentStatus;
use App\Enums\PromotionType;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Session;
use App\Models\TicketType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Stripe;
use Illuminate\Support\Str;

class Checkout
{
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
        };


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
            $array_ids_ticket_selected = array_keys($tickets_quantity);
            $ticket_selected = $tickets->whereIn('id', $array_ids_ticket_selected)
                ->map(function ($item) use ($tickets_quantity) {
                    $item->quantity_selected = $tickets_quantity[$item->id];
                    $item->price_quantity = $item->quantity_selected * $item->price;

                    return $item;
                });
            return $ticket_selected;
        } else {
            return collect([]);
        }
    }
    public static function process_payment(
        Session $session_selected,
        $tickets_selected,
        array $summary,
        Event $event,
        $promotion,
        $user,
        $name,
        $phone,
        $paymentMethod

    ) {
        $payment = new Payment();
        $user = auth()->user();
        $payment->code = rand(1000, 9999) . date('md') . $user->id;
        $payment->session = $session_selected->date;
        $payment->quantity = $summary['ticket_selected']->sum('quantity_selected');
        $payment->event_data = $event->only('name', 'duration');


        //amount
        $payment->fee = $summary['fee'];
        $payment->fee_porcent = $summary['fee_porcent'];
        $payment->sub_total = $summary['sub_total'];
        $payment->total = $summary['total'];

        //json
        $payment->promotion_data = $summary['promotion'];
        $payment->event_data = $event->only(['title', 'duration', 'location.address', 'location.name']);
        $payment->user_data = ['name' => $name, 'phone' => $phone, 'email' => $user->email];

        //relationships
        $payment->event_id = $event->id;
        $payment->session_id = $session_selected->id;
        $payment->user_id = $user->id;
        $payment->promotion_id = $promotion; //nullable

        try {

            $description_stripe = $user->name . " - " . $payment->quantity . " boleto(s)";
            //if (env('APP_ENV') != "testing") {
            if (env('APP_ENV') != "local") {
                $stripe = new Stripe\StripeClient(env('STRIPE_SECRET'));
                $payment = $stripe->paymentIntents->create([
                    'amount' => $payment->total * 100,
                    'currency' => 'usd',
                    'description' => $description_stripe,
                    'payment_method' => $paymentMethod,
                    'confirmation_method' => 'manual',
                    'confirm' => true,
                ]);
                $payment->stripe_id = $payment->id;
            } else {
                $payment->stripe_id = Str::random();
            }
            $payment->status = PaymentStatus::SUCCESSFUL;
            $payment->stripe_id = Str::random();
            $payment->save();

            $tickets = [];
            foreach ($tickets_selected as $key => $ticket) {
                $tickets[$key] = [
                    'name' => $ticket->name,
                    'price' => $ticket->price,
                    'quantity' => $ticket->quantity_selected,
                    'total' => $ticket->price_quantity,
                    'ticket_type_id' => $ticket->id,
                ];
            }

            $payment->tickets()->createMany($tickets);

            DB::commit();
        } catch (\Throwable $e) {

            DB::rollBack();

            return 'Al parecer hubo un error! El pago a través de su targeta no se pudo realizar.';
        }

        return $payment;
    }
}
