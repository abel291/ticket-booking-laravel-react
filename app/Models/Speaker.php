<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
    public function scopeActive($query)
    {
        $query->where('active', 1);
    }
}
