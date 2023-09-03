<?php

namespace App\Models;

use App\Enums\PromotionType;
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
        'type' => PromotionType::class,

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

    public function apply_discount($sub_total)
    {
        if ($this->type == PromotionType::AMOUNT) {

            return $this->value;
        } elseif ($this->type == PromotionType::PERCENT) {

            return $sub_total * ($this->value / 100);
        }
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
