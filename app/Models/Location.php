<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeFilterByRole($query)
    {
        $query->when(auth()->user()->hasRole('user'), function ($query) {
            $query->where('user_id', auth()->user()->id);
        });
    }
}
