<?php

namespace App\Filament\Resources\PromotionResource\Pages;

use App\Filament\Resources\PromotionResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePromotion extends CreateRecord
{
    protected static string $resource = PromotionResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['type'] == "percent" && $data['value'] > 100) {
            $data['value'] = 100;
        }

        return $data;
    }
}
