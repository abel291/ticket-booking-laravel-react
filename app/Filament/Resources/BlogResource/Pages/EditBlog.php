<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use App\Helpers\Helpers;
use App\Models\Blog;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        //dd($data['img']);
        if (Storage::missing($data['img'])) {
            $data['img'] = null;
        }
        return $data;
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {

        if (!Str::contains($data['img'], 'blog/')) {

            $new_img = Helpers::generate_img_name($data['img'], $data['title']);
            $path_new_img = 'blog/' . $new_img;
            Helpers::move_image(
                path_old_img: $data['img'],
                path_new_img: $path_new_img,
                thumbnail: true
            );
            $data['img'] = $path_new_img;
        }

        return $data;
    }
}
