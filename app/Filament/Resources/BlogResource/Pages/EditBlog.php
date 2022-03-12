<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;
    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (Storage::missing($data['img'])) {
            $data['img'] = null;
        }
        return $data;
    }
}
