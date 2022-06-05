<?php

namespace App\Http\Resources;

use App\Enums\TicketTypes;
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
            'slug' => $this->slug,
            'title' => $this->title,
            'duration' => $this->duration,
            'type' => $this->type,
            'desc_min' => $this->desc_min,
            'desc_max' => $this->desc_max,
            'tomatoes' => $this->tomatoes,
            'audience' => $this->audience,
            'score' => $this->score,
            'ceo_title' => $this->ceo_title,
            'ceo_desc' => $this->ceo_desc,
            'social_fa' => $this->social_fa,
            'social_tw' => $this->social_tw,
            'social_yt' => $this->social_yt,
            'card' => $this->card,
            'banner' => $this->banner,
            'thumb' => $this->thumb,
            //'price' => $this->whenLoaded('ticket_default_price', $this->ticket_default_price->price),             
            'session' => SessionResource::make($this->whenLoaded('session')),
            'images' => ImageResource::collection($this->whenLoaded('images')),
            'sessions' => SessionResource::collection($this->whenLoaded('sessions')),
            'location' => LocationResource::make($this->whenLoaded('location')),
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'ticket_types' => TicketTypeResource::collection($this->whenLoaded('ticket_types')),
            'speakers' => SpeakerResource::collection($this->whenLoaded('speakers')),
            //'promotions' => PromotionResource::make($this->whenLoaded('promotions')),
        ];
    }
}
