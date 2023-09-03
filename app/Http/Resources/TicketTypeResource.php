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
            $this->mergeWhen($this->type, [
                'type' => $this->type->text(),
                'typeColor' => $this->type->color(),
            ]),
            'price' => $this->price,
            'default' => $this->default,
            'active' => $this->active,
            'desc' => $this->desc,
            'min_purchase' => $this->min_purchase,
            'max_purchase' => $this->max_purchase,
            //'show_remaining_entries' => $this->show_remaining_entries,
            'remaining' => $this->whenPivotLoaded('sessions', function () {
                return $this->show_remaining_entries ? $this->pivot->remaining : null;
            }),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
