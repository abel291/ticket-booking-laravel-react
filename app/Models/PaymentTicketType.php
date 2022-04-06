<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


<<<<<<<< HEAD:app/Models/PaymentTicketTypeSession.php
class PaymentTicketTypeSession extends Model
========
class PaymentTicketType extends Model
>>>>>>>> dashboard-tailwind:app/Models/PaymentTicketType.php
{
    use HasFactory;
    protected $casts = [
        'session' => 'array',
        'ticket_type' => 'array',
        
    ];
    public function payment()
    {
        return  $this->belongsTo(Payment::class);
    }
     
}
