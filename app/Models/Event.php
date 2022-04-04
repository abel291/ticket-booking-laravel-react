<?php

namespace App\Models;

use App\Enums\EventTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function ticket_types()
    {
        return $this->hasMany(TicketType::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
