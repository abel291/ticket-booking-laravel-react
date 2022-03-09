<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


class PaymentTicketTypeDate extends Model
{
    use HasFactory;
    protected $casts = [
        'date' => 'array',
        'ticket_type' => 'array',
        
    ];
    public function payment()
    {
        return  $this->belongsTo(Payment::class);
    }
}
