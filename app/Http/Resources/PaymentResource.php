<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'code' => $this->code,
            'status' => $this->status,
            'quantity' => $this->quantity,
            'session' => $this->session,
            'promotion_data' => $this->promotion_data,
            'event_data' => $this->event_data,
            'user_data' => $this->user_data,
            'fee' => $this->fee,
            'fee_porcent' => ($this->fee_porcent * 100).'%',
            'sub_total' => $this->sub_total,
            'total' => $this->total,
            'created_at' => $this->created_at,
            'canceled_at' => $this->canceled_at,
            'tickets' => TicketResource::collection($this->whenLoaded('tickets')),
        ];
    }
}
