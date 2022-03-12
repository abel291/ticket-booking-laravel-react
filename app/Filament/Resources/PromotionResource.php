<?php

namespace App\Filament\Resources;

use Akaunting\Money\Money;
use App\Filament\Resources\PromotionResource\Pages;
use App\Filament\Resources\PromotionResource\RelationManagers;
use App\Models\Promotion;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class PromotionResource extends Resource
{
    protected static ?string $model = Promotion::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $label = 'Promocion';
    protected static ?string $pluralLabel = 'Promociones';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(12)
            ->schema([
                Forms\Components\TextInput::make('code')->label('Codigo')
                    ->required()->columnSpan(['sm' => 6])
                    ->maxLength(255),
                Forms\Components\TextInput::make('value')->label('Valor')
                    ->required()->columnSpan(['sm' => 2]),
                Forms\Components\Select::make('type')->options(['percent' => 'Porcentage', 'amount' => 'Monto'])->label('Tipo de valor')
                    ->required()->columnSpan(['sm' => 4]),
                Forms\Components\TextInput::make('quantity')->label('Cantidad')
                    ->required()->columnSpan(['sm' => 6]),
                Forms\Components\DateTimePicker::make('expired')->label('Expira en:')
                    ->required()->columnSpan(['sm' => 6]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->label('Codigo')->extraAttributes(['class' => 'font-bold']),
                
                Tables\Columns\TextColumn::make('')->formatStateUsing(
                    function (Promotion $record) {
                        if ($record->type == 'amount') {
                            return Money::USD($record->value, true);
                        } else {
                            return $record->value . '%';
                        }
                    }
                )->label('Valor'),
                Tables\Columns\TextColumn::make('quantity')->label('Cantidad'),
                Tables\Columns\TextColumn::make('expired')->label('Expiracion')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->label('Fecha de modificado')
                    ->dateTime(),
            ])
            ->bulkActions([])
            ->pushActions([
                Tables\Actions\LinkAction::make('delete')
                    ->action(function (Promotion $record) {

                        if (auth()->user()->id == $record->id) {
                            Filament::notify('danger', 'No Puedes borrar tu mismo usuario');
                            return;
                        }
                        $record->delete();
                        Filament::notify('success', 'Registro borrado');
                    })
                    ->requiresConfirmation()
                    ->color('danger'),
            ])->defaultSort('id','desc')
            ->filters([
                //
            ]);
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
            'index' => Pages\ListPromotions::route('/'),
            'create' => Pages\CreatePromotion::route('/create'),
            'edit' => Pages\EditPromotion::route('/{record}/edit'),
        ];
    }
    public static function getGloballySearchableAttributes(): array
    {
        return ['code', 'value'];
    }
}
