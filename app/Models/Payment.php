<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $casts = [
        'event_data' => 'array',
        'user_data' => 'array',
        'promotion_data' => 'array',
    ];
    public function ticket_types()
    {
        return  $this->hasMany(TicketType::class);
    }
    public function promotion()
    {
        return  $this->belongsTo(Promotion::class);
    }
    public function event()
    {
        return  $this->belongsTo(Event::class);
    }
}
