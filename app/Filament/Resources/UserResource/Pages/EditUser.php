<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Pages\Actions\ButtonAction;
use Filament\Resources\Form;
use Filament\Forms;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {

        if ($data['password'] == null) {
            unset($data['password']);
        }

        return $data;
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
                    ->rules(['sometimes'])
                    ->minLength(6)
                    ->maxLength(255)
                    ->placeholder('Dejar en blanco si no se va a cambiar'),

                Forms\Components\TextInput::make('passwordConfirmation')->label('Confirmar Contraseña')
                    ->placeholder('Dejar en blanco si no se va a cambiar')
                    ->password()
                    ->minLength(6)
                    ->maxLength(255)
            ]);
    }
}