<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Event extends Model
{
    use HasFactory;
    use InteractsWithMedia;
    use HasEagerLimit;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function format()
    {
        return $this->belongsTo(Format::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class)->orderBy('date');
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
            ->where('active', 1)
            ->orderBy('date');
    }

    public function speakers()
    {
        return $this->hasMany(Speaker::class);
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

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function scopeActive($query)
    {
        $query->where('active', 1);
    }

    // /**
    //  * Retrieve the model for a bound value.
    //  *
    //  * @param  mixed  $value
    //  * @param  string|null  $field
    //  * @return \Illuminate\Database\Eloquent\Model|null
    //  */
    // public function resolveRouteBinding($value, $field = null)
    // {
    //     return $this->where('slug', $value)->firstOrFail();
    // }
}
