<?php

namespace App\Models;

use App\Enums\EventTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    

    protected $guarded = [];
    protected $attributes = [
        'active' => 0,
    ];

    public function posts()
    {
        return $this->hasMany(Blog::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
