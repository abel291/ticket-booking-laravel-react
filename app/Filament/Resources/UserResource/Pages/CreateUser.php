<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;
use Filament\Resources\Form;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public  function form(Form $form): Form
    {
        //$dan= new UserResource();
        //dd(UserResource::inputs());
        $inputs = UserResource::inputs();
        return $form
            ->schema([
                ...$inputs,
                Forms\Components\TextInput::make('password')->label('Contraseña')
                    ->password()
                    ->same('passwordConfirmation')
                    ->required()
                    ->minLength(6)
                    ->maxLength(255),

                Forms\Components\TextInput::make('passwordConfirmation')->label('Confirmar Contraseña')
                    ->password()
                    ->required()
                    ->minLength(6)
                    ->maxLength(255)
            ]);
    }
}
