<?php

namespace App\Filament\Resources\PromotionResource\Pages;

use App\Filament\Resources\PromotionResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms\Components\Grid;
class EditPromotion extends EditRecord
{
    protected static string $resource = PromotionResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
