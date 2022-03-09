<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDate extends Model
{
    use HasFactory;
    protected $casts = [
        'times' => 'array',
    ];
    public function ticket_types()
    {
        return $this->belongsToMany(Event::class);
    }
}
