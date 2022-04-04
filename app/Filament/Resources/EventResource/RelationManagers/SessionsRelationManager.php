<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\TimePicker;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class SessionsRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'sessions';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->label('Hora')
                    ->required(),
                Forms\Components\TimePicker::make('time')
                    ->label('Hora')
                    ->required(),                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')->dateTime('d/m/y')->label('Fechas'),
                Tables\Columns\TextColumn::make('time')->dateTime('h:i A')->label('Hora'),                
            ])
            ->filters([
                //
            ]);
    }
}

//reviasr bien los de las relaciones
