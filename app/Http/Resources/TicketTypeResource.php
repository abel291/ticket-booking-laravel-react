<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketTypeResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		return [
			'id' => $this->id,
			'name' => $this->name,
			'quantity' => $this->quantity,
			'type' => $this->type,
			'price' => $this->price,
			'default' => $this->default,
			'desc' => $this->desc,
			'min_tickets_purchase' => $this->min_tickets_purchase,
			'max_tickets_purchase' => $this->max_tickets_purchase,
			//'show_remaining_entries' => $this->show_remaining_entries,
			'remaining' => $this->whenPivotLoaded('session_ticket_type', function () {
				return $this->show_remaining_entries ? $this->pivot->remaining : null;
			}),
		];
	}
}
