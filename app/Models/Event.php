<?php

namespace App\Models;

use App\Enums\EventTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Event extends Model implements HasMedia
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

    public function sessions()
    {
        return $this->hasMany(Session::class)->orderBy('date');;
    }
    public function speakers()
    {
        return $this->hasMany(Speaker::class);
    }

    //me devuelve una sola  sesion con la fecha futura mas cerca de la fecha actual
    public function session()
    {
        return $this->hasOne(Session::class)->ofMany([
            'date' => 'min',
            //'id' => 'max',
        ], function ($query) {
            $query->where('active', 1)->where('date', '>=', now());
        });
    }



    public function ticket_types()
    {
        return $this->hasMany(TicketType::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function promotions()
    {
        return $this->belongsToMany(Promotion::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Register the media collections
     */
    public function registerMediaCollections(): void
    {

        $this->addMediaCollection('banner')->singleFile();
        $this->addMediaCollection('card')->singleFile();

        // $this->addMediaCollection('image')->singleFile()
        //     ->registerMediaConversions(function (Media $media) {
        //         $this
        //             ->addMediaConversion('thumb')
        //             //->width(320)
        //             ->height(320);
        //     });
    }

    public function scopeActive($query)
    {
        $query->where('active', 1);
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('slug', $value)->active()->firstOrFail();
    }
}
