<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


class Ticket extends Model
{
    use HasFactory;
    protected $casts = [
        'ticket_type' => 'object',        
    ];
    public function payment()
    {
        return  $this->belongsTo(Payment::class);
    }
}
