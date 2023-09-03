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
            'id' => $this->id,
            'date' => $this->date->format('Y-m-d H:i:s'),
            'dateFormat' => $this->date->isoFormat('MMMM DD \, YYYY hh:mm A'),
            'dateFormatShort' => $this->date->isoFormat('MMM DD \, hh:mm A'),
            'active' => $this->active,
            'ticket_types' => TicketTypeResource::collection($this->whenLoaded('ticket_types')),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
