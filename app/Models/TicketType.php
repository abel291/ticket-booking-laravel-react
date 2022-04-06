<?php

namespace App\Models;

use App\Enums\EventTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'type' => EventTypes::class,
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
<<<<<<< HEAD
    public function sessions()
    {
        return $this->belongsToMany(Session::class);
    }
=======
    // public function sessions()
    // {
    //     return $this->belongsToMany(Session::class,'session_ticket_type');
    // }
>>>>>>> dashboard-tailwind
}
