<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpeakerResource extends JsonResource
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
            'name' => $this->name,
            'position' => $this->position,
            'email' => $this->email,
            'website' => $this->website,
            'desc' => $this->desc,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'img' => $this->img
        ];
    }
}
