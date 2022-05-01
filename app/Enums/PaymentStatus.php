<?php

namespace App\Enums;

enum PaymentStatus: int
{
    case CANCELED = 1;
    case REFUNDED = 2;
    case SUCCESSFUL = 3;   
    
    public function text():string{

        return  match($this){
            PaymentStatus::CANCELED => 'cancelado',
            PaymentStatus::REFUNDED => 'reembolsado',
            PaymentStatus::SUCCESSFUL =>'aceptado',
        };
    }
    
    public function color():string{

        return  match($this){
            PaymentStatus::CANCELED => 'gray',
            PaymentStatus::REFUNDED => 'gray',
            PaymentStatus::SUCCESSFUL => 'green',
        };
    }
    public function icon():string{

        return  match($this){
            PaymentStatus::CANCELED => 'heroicon-s-x',
            PaymentStatus::REFUNDED => 'heroicon-o-receipt-refund',
            PaymentStatus::SUCCESSFUL => 'heroicon-s-check',
        };
    }
}
