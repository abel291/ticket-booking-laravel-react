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
            //'type' => $this->type,
            'entry' => $this->entry,
            'description' => $this->description,
            'card' => $this->card,
            'banner' => $this->banner,
            'thumb' => $this->card,
            //'price' => $this->whenLoaded('ticket_default_price', $this->ticket_default_price->price),
            'session' => SessionResource::make($this->whenLoaded('session')),
            'images' => ImageResource::collection($this->whenLoaded('images')),
            'sessions' => SessionResource::collection($this->whenLoaded('sessions')),
            'location' => LocationResource::make($this->whenLoaded('location')),
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'subCategory' => CategoryResource::make($this->whenLoaded('sub_category')),
            'ticketTypes' => TicketTypeResource::collection($this->whenLoaded('ticket_types')),
            'speakers' => SpeakerResource::collection($this->whenLoaded('speakers')),
            //'promotions' => PromotionResource::make($this->whenLoaded('promotions')),
        ];
    }
}
