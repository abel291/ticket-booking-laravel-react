<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTicket extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function order()
    {
        return  $this->belongsTo(Order::class);
    }

    public function session()
    {
        return  $this->belongsTo(Session::class);
    }
    public function ticket_type()
    {
        return  $this->belongsTo(TicketType::class);
    }
}
