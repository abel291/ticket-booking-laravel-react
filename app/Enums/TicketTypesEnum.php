<?php

namespace App\Enums;

enum TicketTypesEnum: string
{
    case FREE = 'free';
    case PAID = 'paid';

    public function text(): string
    {
        return  match ($this) {
            TicketTypesEnum::FREE => 'Gratuito',
            TicketTypesEnum::PAID => 'de Pago',
        };
    }
    public function color(): string
    {
        return  match ($this) {
            TicketTypesEnum::FREE => 'green',
            TicketTypesEnum::PAID => 'blue',
        };
    }
}
