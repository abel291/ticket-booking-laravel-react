<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $casts = [
        'event' => 'array',
        'user' => 'array',
    ];
    public function ticket_types()
    {
        return  $this->hasMany(TicketType::class);
    }
}