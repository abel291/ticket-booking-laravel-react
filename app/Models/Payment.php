<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $casts = [
        'event_data' => 'object',
        'user_data' => 'object',
        'promotion_data' => 'object',
        'status' => PaymentStatus::class,
    ];
    protected $attributes = [
        'code' => '',
        'status' => PaymentStatus::SUCCESSFUL,
        'sub_total' => 0,
        'total' => 0,
    ];
    public function tickets()
    {
        return  $this->hasMany(Ticket::class);
    }
    public function promotion()
    {
        return  $this->belongsTo(Promotion::class);
    }
    public function event()
    {
        return  $this->belongsTo(Event::class);
    }
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
