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
}
