<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    use HasFactory;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function sessions()
    {
        return $this->belongsToMany(Session::class);
    }

    //scope
    public function scopeActive($query)
    {
        $query->where('active', 1);
    }
}
