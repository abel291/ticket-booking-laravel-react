<?php

namespace App\Helpers;

use App\Enums\PromotionType;

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
}
