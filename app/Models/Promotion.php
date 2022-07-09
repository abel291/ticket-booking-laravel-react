<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'expired' => 'datetime',

    ];

    protected $attributes = [
        'active' => 1,
    ];

    protected function code(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => strtoupper($value),
        );
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function payments()
    {
        return  $this->hasMany(Payment::class);
    }

    // protected static function booted()
    // {
    //     static::addGlobalScope(new ActiveScope);
    // }
	public function scopeActive($query)
    {
        $query->where('active', 1);
    }
}
