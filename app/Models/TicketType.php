<?php

namespace App\Models;

use App\Enums\TicketTypesEnum;
use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'type' => TicketTypesEnum::class,
        'sales_start_date' => 'datetime:Y-m-d H:i:s',
        'sales_end_date' => 'datetime:Y-m-d H:i:s',
    ];

    protected $attributes = [
        'type' => TicketTypesEnum::PAID,
        'min_purchase' => 1,
        'max_purchase' => 10,

    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function sessions()
    {
        return $this->belongsToMany(Session::class)->withPivot('sales')->as('ticket');
    }

    public function order_tickets()
    {
        return $this->hasMany(OrderTicket::class);
    }

    public function calculatePrice()
    {
        if ($this->includeFee) {
            $this->price = $this->price_basic;
        } else {
            $this->price = $this->price_basic + $this->price_basic * 0.1;
        }
    }

    public function scopeActive($query)
    {
        $query->where('active', 1);
    }
    public function scopeFilterByRole($query)
    {
        $query->when(auth()->user()->hasRole('user'), function ($query) {
            $query->where('user_id', auth()->user()->id);
        });
    }
}
