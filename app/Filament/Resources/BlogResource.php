<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $label = 'Post';
    protected static ?string $pluralLabel = 'Posts';
    protected static ?string $navigationGroup = 'Blog';    

    public static string $path_image = 'blog';

    public static function form(Form $form): Form
    {
        //dd(storage_path('app'));
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Titulo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')->label('Slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('img')
                    ->label('Imagen Principal')->image()                    
                    ->required(),
                //->maxLength(255),
                Forms\Components\BelongsToSelect::make('category_id')->relationship('category', 'name')->label('Categoria')
                    ->required(),
                //->maxLength(255),
                Forms\Components\TextInput::make('desc_min')->label('Descripcion pequeña')
                    ->required()
                    ->columnSpan(2)
                    ->maxLength(255),
                Forms\Components\RichEditor::make('desc_max')->label('Descripcion completa')
                    ->disableToolbarButtons([
                        'attachFiles',
                        'codeBlock',
                    ])
                    ->required()
                    ->columnSpan(2)
                //->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('title')->label('Titulo'),
                //Tables\Columns\ImageColumn::make('img')->rounded(),
                //Tables\Columns\ImageColumn::make('img'),
                //Tables\Columns\TextColumn::make('desc_min'),
                //Tables\Columns\TextColumn::make('desc_max'),
                Tables\Columns\BadgeColumn::make('category.name')->colors(['primary'])->label('Categoria'),
                //Tables\Columns\TextColumn::make('created_at')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime('Y-m-d h:i A')->label('Ultima modificacion'),
            ])
            ->bulkActions([])
            ->pushActions([
                Tables\Actions\LinkAction::make('Eliminar')
                    ->action(function (Blog $record) {
                        $record->delete();
                        Filament::notify('success', 'Registro Borrado');
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
    public static function getPathImg(): string{
        return 'blog';
    }
}
