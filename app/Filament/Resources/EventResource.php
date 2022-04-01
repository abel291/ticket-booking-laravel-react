<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Titulo')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('duration')
                    ->label('Duracion')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('slug')
                    ->label('Url')
                    ->required()
                    ->maxLength(255),

                Forms\Components\BelongsToSelect::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Categoria')
                    ->required(),

                Forms\Components\BelongsToSelect::make('location_id')
                    ->relationship('location', 'address')
                    ->label('Ubicacion')
                    ->required()
                    ->columnSpan(2),

                Forms\Components\TextInput::make('des_min')
                    ->label('Descripción pequeña')
                    ->required()
                    ->columnSpan(3)
                    ->maxLength(255),

                Forms\Components\RichEditor::make('des_max')
                    ->label('Descripción completa')
                    ->disableToolbarButtons(['attachFiles', 'codeBlock'])
                    ->required()
                    ->columnSpan(3),

                Fieldset::make('Imagenes')
                    ->columns(3)
                    ->schema([
                        Forms\Components\FileUpload::make('img_banner')
                            ->label('Banner')
                            ->required()
                            ->image(),

                        Forms\Components\FileUpload::make('img_card')
                            ->label('Card')
                            ->required()
                            ->image(),

                        Forms\Components\FileUpload::make('img_thum')
                            ->label('Miniatura')
                            ->required()
                            ->image(),

                    ]),

                Fieldset::make('Ceo')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('ceo_title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('ceo_desc')
                            ->required()
                            ->maxLength(255),
                    ]),


                Fieldset::make('Social media')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('social_fa')
                            ->label('Link Facebook')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('social_tw')
                            ->label('Link Twiter')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('social_yt')
                            ->label('Link YouTube')
                            ->maxLength(255),
                    ]),

                // Fieldset::make('Peliculas')
                //     ->columns(3)
                //     ->schema([
                //         Forms\Components\TextInput::make('tomatoes')
                //             ->label('Tomatoes')
                //             ->maxLength(255)
                //             ->columnSpan(['sm' => 1]),
                //         Forms\Components\TextInput::make('audience')
                //             ->label('Audiencia')
                //             ->maxLength(255)
                //             ->columnSpan(['sm' => 1]),
                //         Forms\Components\TextInput::make('score')
                //             ->label('Calificacion')
                //             ->maxLength(255)
                //             ->columnSpan(['sm' => 1]),
                //     ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')->label('Nombre'),
                Tables\Columns\TextColumn::make('duration')->label('Duracion'),
                Tables\Columns\TextColumn::make('updated_at')->dateTime('M d, Y h:i A')->label('Última modificación'),
            ])
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
