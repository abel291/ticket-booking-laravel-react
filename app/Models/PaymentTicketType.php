<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


class PaymentTicketType extends Model
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
