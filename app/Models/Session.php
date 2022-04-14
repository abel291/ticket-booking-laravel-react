<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];

    /**
     * get Time 12 hour
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function time(): Attribute
    {

        return Attribute::make(
            get: fn ($value) => Carbon::createFromFormat('H:i:s', $value)->format('h:i A'),
            set: fn ($value) => Carbon::createFromFormat('h:i A', $value)->format('H:i:00'),
        );
    }

    public function ticket_types()
    {
        return $this->belongsToMany(Event::class);
    }
}
