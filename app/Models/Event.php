<?php

namespace App\Models;

use App\Enums\EventTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Event extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $casts = [
        'type' => EventTypes::class,
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // public function images()
    // {
    //     return $this->morphMany(Image::class, 'imageable');
    // }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    //me devuelve una sesion con la fecha futura mas cerca de la fecha actual
    public function session()
    {
        return $this->hasOne(Session::class)->ofMany([
            'date' => 'min',
            //'id' => 'max',
        ], function ($query) {
            $query->where('date', '>=', now());
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
}
