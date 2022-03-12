<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $label = 'Categoria';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')->label('Slug')
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
                //Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\BooleanColumn::make('active')->label('Activo'),
                Tables\Columns\TextColumn::make('updated_at')->label('Creacion')->dateTime(),
            ])
            ->bulkActions([])
            ->pushActions([
                Tables\Actions\LinkAction::make('delete')
                    ->action(function (Category $record) {
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
