<?php

namespace App\Enums;

enum OrderStatus: string
{
    case CANCELED = 'canceled';
    case REFUNDED = 'refunded';
    case SUCCESSFUL = 'successful';

    public function text(): string
    {
        return  match ($this) {
            OrderStatus::CANCELED => 'cancelado',
            OrderStatus::REFUNDED => 'reembolsado',
            OrderStatus::SUCCESSFUL => 'aceptado',
        };
    }

    public function color(): string
    {
        return  match ($this) {
            OrderStatus::CANCELED => 'gray',
            OrderStatus::REFUNDED => 'gray',
            OrderStatus::SUCCESSFUL => 'green',
        };
    }

    public function icon(): string
    {
        return  match ($this) {
            OrderStatus::CANCELED => 'heroicon-s-x',
            OrderStatus::REFUNDED => 'heroicon-o-receipt-refund',
            OrderStatus::SUCCESSFUL => 'heroicon-s-check',
        };
    }
}
