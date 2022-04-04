<?php

namespace App\Filament\Resources\EventResource\RelationManagers;

use Akaunting\Money\Money;
use App\Enums\TicketTypes;
use App\Models\Event;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;

class TicketTypesRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'ticket_types';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $label = 'Tipo de ticket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('quantity')
                    ->label('Cantidad disponible')
                    ->numeric()
                    ->minValue(1)
                    ->required(),

                Forms\Components\TextInput::make('price')
                    ->label('Precio')
                    ->numeric()
                    ->minValue(1)
                    ->required(),

                Forms\Components\TextInput::make('desc')
                    ->label('Descripción pequeña')
                    ->required()
                    ->columnSpan(3)
                    ->maxLength(255),

                Forms\Components\TextInput::make('min_tickets_purchase')
                    ->label('Cantidad minima por comprar')
                    ->numeric()
                    ->minValue(1)
                    ->required(),

                Forms\Components\TextInput::make('max_tickets_purchase')
                    ->label('Cantidad maxima por comprar')
                    ->numeric()
                    ->minValue(1)
                    ->required(),

                Forms\Components\Select::make('type')->label('Tipo de ticket')
                    ->options([
                        TicketTypes::PAID->value => 'De Pago',
                        TicketTypes::FREE->value => 'Gratuita',
                    ]),

                Forms\Components\Toggle::make('show_remaining_entries')->label('Mostrar entradas restantes')
                    ->required(),

                Forms\Components\Toggle::make('active')->label('Activo')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nombre'),
                Tables\Columns\TextColumn::make('price')->label('Precio')
                    ->formatStateUsing(fn (string $state): string => Money::USD($state, true)),
                Tables\Columns\TextColumn::make('type')->enum([
                    TicketTypes::PAID->value => 'De Pago',
                    TicketTypes::FREE->value => 'Gratuita',
                ])->label('Tipo'),
                Tables\Columns\BooleanColumn::make('is_featured')->label('active')
            ])            
            ->filters([
                //
            ]);
    }

    
}
