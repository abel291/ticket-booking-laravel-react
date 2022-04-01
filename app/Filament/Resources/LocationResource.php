<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LocationResource\Pages;
use App\Filament\Resources\LocationResource\RelationManagers;
use App\Models\Location;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;

    protected static ?string $label = 'Ubicacion';
    protected static ?string $pluralLabel = 'Ubicaciones';

    protected static ?string $navigationIcon = 'heroicon-o-location-marker';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')->label('Direccion')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('phone')->label('Telefono de contacto')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('active')->label('Activo')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nombre'),
                Tables\Columns\TextColumn::make('address')->label('Direccion'),
                //Tables\Columns\TextColumn::make('phone')->label('Telefono de contacto'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('M d, Y h:i A')->label('Última modificación'),

            ])
            ->bulkActions([])
            ->pushActions([
                Tables\Actions\LinkAction::make('Eliminar')
                    ->action(function (Location $record) {
                        if (!$record->events->count()) {
                            $record->forceDelete();
                        } else {
                            $record->delete();
                        }
                        Filament::notify('success', 'Registro borrado');
                    })
                    ->requiresConfirmation()
                    ->color('danger'),
            ])
            ->filters([
                //
            ])->defaultSort('id', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLocations::route('/'),
            'create' => Pages\CreateLocation::route('/create'),
            'edit' => Pages\EditLocation::route('/{record}/edit'),
        ];
    }
}
