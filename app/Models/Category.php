<?php

namespace App\Models;

use App\Enums\CategoryType;
use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Category extends Model
{
	use HasFactory;
	use HasEagerLimit;

	protected $attributes = [
		'active' => 0,
	];

	protected $casts = [
		'type' => CategoryType::class,
	];

	public function posts()
	{
		return $this->belongsToMany(Blog::class);
	}

	public function events()
	{
		return $this->hasMany(Event::class);
	}
	
	public function scopeTypeEvent($query)
	{
		$query->where('type', CategoryType::EVENT);
	}
	public function scopeActive($query)
	{
		$query->where('active', 1);
	}
}
