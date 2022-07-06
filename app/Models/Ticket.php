<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function payment()
    {
        return  $this->belongsTo(Payment::class);
    }

    public function ticket_type()
    {
        return  $this->hasOne(TicketType::class);
    }
}
