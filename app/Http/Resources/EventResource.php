<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //dd($this->ticket_default_price);
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'duration' => $this->duration,
            'type' => $this->type,
            'status' => $this->status?->title(),
            'status_color' => $this->status?->color(),
            'entry' => $this->entry,
            'ticket_types_sum' => $this->ticket_types_sum,
            'ticket_sales_sum' => $this->ticket_sales_sum,
            'description' => $this->description,
            'card' => $this->card,
            'banner' => $this->banner,
            'active' => $this->active,
            'thum' => $this->thum,
            //'price' => $this->whenLoaded('ticket_default_price', $this->ticket_default_price->price),
            'session' => SessionResource::make($this->whenLoaded('session')),
            'images' => ImageResource::collection($this->whenLoaded('images')),
            'sessions' => SessionResource::collection($this->whenLoaded('sessions')),
            'location' => LocationResource::make($this->whenLoaded('location')),
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'subCategory' => CategoryResource::make($this->whenLoaded('subCategory')),
            'ticketTypes' => TicketTypeResource::collection($this->whenLoaded('ticket_types')),
            'speakers' => SpeakerResource::collection($this->whenLoaded('speakers')),
            //'updated_at' => $this->whenLoaded('updated_at', $this->updated_at->isoFormat('DD MMM YYYY hh:mm A'))
            //'promotions' => PromotionResource::make($this->whenLoaded('promotions')),
        ];
    }
}
