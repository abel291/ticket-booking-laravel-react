<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'fee' => $this->fee,
            'fee_porcent' => ($this->fee_porcent * 100) . '%',
            'sub_total' => $this->sub_total,
            'total' => $this->total,
            'data' => $this->data,
            'created_at' => $this->created_at,
            'canceled_at' => $this->canceled_at,
            'order_tickets' => OrderTicketResource::collection($this->whenLoaded('order_tickets')),
        ];
    }
}
