<?php

namespace App\Models;

use App\Enums\EventTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    
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
