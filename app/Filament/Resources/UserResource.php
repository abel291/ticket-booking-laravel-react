<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Facades\Filament;

class UserResource extends Resource
{

    protected static ?string $model = User::class;
    protected static ?string $label = 'Usuario';
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function inputs()
    {
        return [
            Forms\Components\TextInput::make('name')->label('Nombre')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('phone')->label('Telefono')
                ->tel()
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('email')->label('Correo Electronico')
                ->email()
                ->required()
                ->unique(ignorable: fn (?User $record): ?User => $record)
                ->maxLength(255),

        ];
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('email'),
            ])
            ->bulkActions([])
            ->pushActions([
                Tables\Actions\LinkAction::make('delete')
                    ->action(function (User $record) {

                        if (auth()->user()->id == $record->id) {
                            Filament::notify('danger', 'No Puedes borrar tu mismo usuario');
                            return;
                        }
                        $record->delete();
                        Filament::notify('success', 'Usuario borrado');
                    })
                    ->requiresConfirmation()
                    ->color('danger'),
            ])
            ->filters([
                //
            ])->defaultSort('id','desc');
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
