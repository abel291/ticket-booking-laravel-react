<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use App\Models\Event;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;
    
}
