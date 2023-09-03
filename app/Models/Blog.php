<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Blog extends Model
{

    use HasFactory;

    protected $table = 'blog';

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
