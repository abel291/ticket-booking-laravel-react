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
<<<<<<< HEAD
    public function ticket_type_sessions()
    {
        return  $this->hasMany(PaymentTicketTypeSession::class);
    }
    public function promotions()
    {
        return  $this->belongsTo(Promotion::class);
=======
    public function ticket_types()
    {
        return  $this->hasMany(TicketType::class);
>>>>>>> dashboard-tailwind
    }
}
