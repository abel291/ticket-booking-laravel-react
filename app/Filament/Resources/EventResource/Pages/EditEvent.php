<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Helpers\Helpers;
use App\Models\Event;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        //dd($data['img']);

        $data['img_banner'] = Storage::missing($data['img_banner']) ? null : $data['img_banner'];
        $data['img_card'] = Storage::missing($data['img_card']) ? null : $data['img_card'];
        $data['img_thum'] = Storage::missing($data['img_thum']) ? null : $data['img_thum'];
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {

        $path = EventResource::$path_img;;
        $data['slug'] = Str::slug($data['slug']);

        if (!Str::contains($data['img_banner'], $path)) {

            $data['img_banner'] = Helpers::move_image(
                path_old_img: $data['img_banner'],
                name: 'banner-' . $data['slug'],
                location: $path . $data['slug']
            );
        }
        if (!Str::contains($data['img_card'], $path)) {

            $data['img_card'] = Helpers::move_image(
                path_old_img: $data['img_card'],
                name: 'card-' . $data['slug'],
                location: $path . $data['slug']
            );
        }
        if (!Str::contains($data['img_thum'], $path)) {

            $data['img_thum'] = Helpers::move_image(
                path_old_img: $data['img_thum'],
                name: 'thum-' . $data['slug'],
                location: $path . $data['slug']
            );
        }

        return $data;
    }
}
