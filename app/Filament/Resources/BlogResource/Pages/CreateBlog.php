<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use App\Helpers\Helpers;
use App\Models\Blog;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $new_img = Helpers::generate_img_name($data['img'], $data['title']);

        $path_new_img = 'blog/' . $new_img;

        Helpers::move_image(
            path_old_img: $data['img'],
            name: $path_new_img,
            thumbnail: true
        );


        $data['img'] = $path_new_img;
        return $data;
    }
}
