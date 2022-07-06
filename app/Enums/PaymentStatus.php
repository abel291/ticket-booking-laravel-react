<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case CANCELED = 'canceled';
    case REFUNDED = 'refunded';
    case SUCCESSFUL = 'successful';

    public function text(): string
    {
        return  match ($this) {
            PaymentStatus::CANCELED => 'cancelado',
            PaymentStatus::REFUNDED => 'reembolsado',
            PaymentStatus::SUCCESSFUL => 'aceptado',
        };
    }

    public function color(): string
    {
        return  match ($this) {
            PaymentStatus::CANCELED => 'gray',
            PaymentStatus::REFUNDED => 'gray',
            PaymentStatus::SUCCESSFUL => 'green',
        };
    }

    public function icon(): string
    {
        return  match ($this) {
            PaymentStatus::CANCELED => 'heroicon-s-x',
            PaymentStatus::REFUNDED => 'heroicon-o-receipt-refund',
            PaymentStatus::SUCCESSFUL => 'heroicon-s-check',
        };
    }
}
