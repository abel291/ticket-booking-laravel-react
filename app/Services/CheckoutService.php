<?php

namespace App\Services;

use App\Enums\PaymentStatus;
use App\Enums\PromotionType;
use App\Http\Resources\PromotionResource;
use App\Http\Resources\TicketTypeResource;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Promotion;
use App\Models\TicketType;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutService
{
	public $sub_total = 0;
	public $tickets_selected;

	public function __construct(
		public object $tickets,
		public array $tickets_quantity,
		public $promotion = null,
	) {
	}

	public static function summary(float $sub_total, $promotion_selected = null)
	{

		if ($promotion_selected) {
			$discount = self::apply_discount($sub_total, $promotion_selected);
		} else {
			$discount = 0;
		}

		if ($sub_total < $discount) {
			$discount = $sub_total;
			$total = 0;
			$fee = 0;
		} else {
			$sub_total_with_dicount = $sub_total - $discount;
			$fee = $sub_total_with_dicount * config('fee.event');
			$total = $sub_total_with_dicount + $fee;
		}

		return  [
			'sub_total' => $sub_total,
			'fee_porcent' => config('fee.event'),
			'fee' => $fee,
			'discount' => $discount,
			'total' => $total,
		];
	}

	public static function tickets_quantity_selected($tickets, array $tickets_quantity)
	{

		if ($tickets_quantity) {

			$tickets_quantity = array_filter($tickets_quantity);

			$ids_tickets_selected = array_keys($tickets_quantity);

			$tickets_selected = $tickets->whereIn('id', $ids_tickets_selected)
				->map(function ($item) use ($tickets_quantity) {

					$item->quantity_selected = $tickets_quantity[$item->id];
					$item->price_quantity = $tickets_quantity[$item->id] * $item->price;

					return $item;
				});
		} else {
			$tickets_selected = collect([]);
		}
		return $tickets_selected;
	}

	public static function apply_discount(float $sub_total, $promotion)
	{
		if ($promotion->type == PromotionType::AMOUNT) {

			return $promotion->value;
		} elseif ($promotion->type == PromotionType::PERCENT) {

			return $sub_total * ($promotion->value / 100);
		}
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
