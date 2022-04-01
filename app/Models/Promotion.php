<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    
    public function payments()
    {
        return  $this->hasMany(Payment::class);
    }
}
