<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Resources\Pages\CreateRecord;
use App\Helpers\Helpers;
use App\Models\Event;
use Illuminate\Support\Str;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;
    protected function afterFill(): void
    {

        $event = Event::factory()->state([
            'img_banner' => null,
            'img_card' => null,
            'img_thum' => null,
        ])->make();
        $event->category_id = 1;
        $event->location_id = 1;
        $this->form->fill($event->toArray());
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['slug'] = Str::slug($data['slug']);

        $data['img_banner'] = Helpers::move_image(
            path_old_img: $data['img_banner'],
            name: 'banner-' . $data['slug'],
            location: 'events/' . $data['slug']
        );

        $data['img_card'] = Helpers::move_image(
            path_old_img: $data['img_card'],
            name: 'card-' . $data['slug'],
            location: 'events/' . $data['slug']
        );

        $data['img_thum'] = Helpers::move_image(
            path_old_img: $data['img_thum'],
            name: 'thum-' . $data['slug'],
            location: 'events/' . $data['slug']
        );

        return $data;
    }
}
