<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case CANCELED = 'canceled';
    case REFUNDED = 'refunded';
    case SUCCESSFUL = 'successful';    
}
