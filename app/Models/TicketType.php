<?php

namespace App\Models;

use App\Scopes\ActiveScope;
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

    protected static function booted()
    {
        static::addGlobalScope(new ActiveScope);
    }
}
