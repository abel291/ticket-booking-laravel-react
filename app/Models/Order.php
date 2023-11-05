<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'data' => 'object',
        'canceled' => 'object',
        'status' => OrderStatus::class,
        'data.session' =>  'datetime:Y-m-d H:i:s',
    ];
    public function order_tickets()
    {
        return  $this->hasMany(OrderTicket::class);
    }
    public function event()
    {
        return  $this->belongsTo(Event::class);
    }
    public function session()
    {
        return  $this->belongsTo(Session::class);
    }
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
}
