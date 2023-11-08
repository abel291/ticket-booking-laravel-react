<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Enums\PromotionType;
use App\Http\Resources\PromotionResource;
use App\Http\Resources\TicketTypeResource;
use App\Models\Event;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Promotion;
use App\Models\TicketType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderService
{
    public $sub_total = 0;
    public $tickets_selected;

    public function __construct(
        public object $tickets,
        public array $tickets_quantity,
        public $promotion = null,
    ) {
    }
    public static function generateCode($id): string
    {
        return date('md') . str_pad(Mt_rand(1, 1000), 4, 0) . $id;
    }
    public static function createOrder($event, $session_selected, $tickets_selected, $promotion = null)
    {

        $total = self::calculateTotal(
            $tickets_selected,
            promotion: $promotion
        );

        $order = new Order();
        $order->code = self::generateCode($event->user_id);
        $order->sub_total = $total['sub_total'];
        $order->fee_porcent = $total['fee_porcent'];
        $order->fee = $total['fee'];
        $order->total = $total['total'];

        $order->quantity = $tickets_selected->sum('quantity_selected');

        $order->data = [
            'event' => [
                'title' => $event->title,
                'location_address' => $event->location->address,
                'location_name' => $event->location->name,
                'duration' => $event->duration,
            ],
            'session' => $session_selected->date,
            'promotion' => $promotion ? $promotion->only('applied', 'value', 'type', 'code') : null,
            'user' => [],
        ];

        //relationships

        if ($promotion) {
            $order->promotion_id = $promotion->id;
        }
        $order->event_id = $event->id;
        $order->session_id = $session_selected->id;
        $order->user_id = $event->user_id;
        return $order;
    }

    public static function calculateTotal($tickets_selected, $promotion = null)
    {
        $sub_total = $tickets_selected->sum('price_quantity');

        if ($promotion && $sub_total > 0) {
            $promotionApplied = $promotion->apply_discount($sub_total);
            $promotion->applied = $promotionApplied;
        } else {
            $promotionApplied = 0;
            $promotion = null;
        }

        if ($sub_total < $promotionApplied) {
            //$promotion = $sub_total;
            $total = 0;
            $fee = 0;
        } else {
            $sub_total_with_dicount = $sub_total - $promotionApplied;
            $fee = $sub_total_with_dicount * config('fee.event');
            $total = $sub_total_with_dicount + $fee;
        }

        return  [
            'sub_total' => $sub_total,
            'fee_porcent' => config('fee.event'),
            'fee' => $fee,
            'promotion' => $promotion,
            'total' => $total,
        ];
    }

    public static function calculatePriceTicket($tickets, array $tickets_quantity)
    {

        if ($tickets_quantity) {

            $tickets_quantity = array_filter($tickets_quantity);

            $ids_tickets_selected = array_keys($tickets_quantity);

            $tickets_selected = $tickets->whereIn('id', $ids_tickets_selected)
                ->map(function ($item) use ($tickets_quantity) {

                    $item->quantity_selected = $tickets_quantity[$item->id];
                    $item->price_quantity = $tickets_quantity[$item->id] * $item->price;

                    return $item;
                })->values();
        } else {
            $tickets_selected = collect([]);
        }
        return $tickets_selected;
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
}
