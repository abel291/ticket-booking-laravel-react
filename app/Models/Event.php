<?php

namespace App\Models;

use App\Enums\EventStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'status' => EventStatus::class,

    ];

    protected $attributes = [
        'status' => EventStatus::DRAFT,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function format()
    {
        return $this->belongsTo(Format::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'model');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class)->orderBy('date');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function order_tickets()
    {
        return $this->hasMany(OrderTicket::class);
    }

    //me devuelve una sola  sesion con la fecha mas cerca de la fecha actual
    public function session()
    {
        return $this->hasOne(Session::class)->ofMany([
            'date' => 'min',
        ], function ($query) {
            //$query->where('date', '>=', now());
        });
    }

    public function sessions_available()
    {
        return $this->hasMany(Session::class)
            //->where('date', '>=', now())
            ->active()
            ->orderBy('date');
    }

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class);
    }

    public function ticket_types()
    {
        return $this->hasMany(TicketType::class);
    }

    public function ticket_default_price()
    {
        return $this->hasOne(TicketType::class)->ofMany(['price' => 'max'], function ($query) {
            $query->where('default', 1)->where('active', 1);
        });
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class)->withPivot('remaining', 'quantity');
    }

    public function promotions_available()
    {
        return $this->belongsToMany(Promotion::class)
            ->where('active', true)
            //->where('expired', '>', now())
            ->wherePivot('remaining', '>', 0);
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
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
