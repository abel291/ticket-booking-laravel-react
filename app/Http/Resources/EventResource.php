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
        return [
            'slug' => $this->slug,
            'name' => $this->name,
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
            'card' => '/img/events/img-' . rand(1, 8) . '.jpg',
            //'card'=>$this->getFirstMediaUrl('card'), 
            'session' => $this->session,
            'session' => SessionResource::make($this->whenLoaded('session')),
            'sessions' => SessionResource::collection($this->whenLoaded('sessions')),
            'location' => LocationResource::make($this->whenLoaded('location')),
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'ticket_types' => $this->whenLoaded('ticket_types'),
            //'promotions' => PromotionResource::make($this->whenLoaded('promotions')),
        ];
    }
}
