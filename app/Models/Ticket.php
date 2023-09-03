<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function event()
    {
        return  $this->belongsTo(Event::class);
    }

    public function ticket_type()
    {
        return  $this->belongsTo(TicketType::class);
    }
    public function session()
    {
        return  $this->belongsTo(Session::class);
    }
}
