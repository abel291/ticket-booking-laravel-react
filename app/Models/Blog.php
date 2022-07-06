<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Blog extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $table = 'blog';

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Register the media collections
     */
    public function registerMediaCollections(): void
    {
        $this
        ->addMediaCollection('image')
        ->singleFile()
        ->registerMediaConversions(function (Media $media) {
            $this
                ->addMediaConversion('thumb')
                //->width(320)
                ->height(320);
        });
    }
}
