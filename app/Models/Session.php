<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    
    // public function ticket_types()
    // {
    //     return $this->belongsToMany(TicketType::class);
    // }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
