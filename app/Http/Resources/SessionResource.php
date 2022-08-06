<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
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
            //'id' => $this->id,
            'date' => $this->date->format('Y-m-d H:i:s'),
            'tickets' => TicketTypeResource::collection($this->whenLoaded('ticket_types_available')),
            //'time' => $this->time,

        ];
    }
}
