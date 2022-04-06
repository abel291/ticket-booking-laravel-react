<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    
<<<<<<< HEAD
    // public function ticket_types()
    // {
    //     return $this->belongsToMany(TicketType::class);
    // }

    public function event()
    {
        return $this->belongsTo(Event::class);
=======
    public function ticket_types()
    {
        return $this->belongsToMany(Event::class);
>>>>>>> dashboard-tailwind
    }
}
