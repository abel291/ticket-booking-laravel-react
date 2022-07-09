<?php

namespace App\Models;

use App\Enums\TicketTypesEnum;
use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
	use HasFactory;

	protected $casts = [
		'type' => TicketTypesEnum::class,
	];

	public function event()
	{
		return $this->belongsTo(Event::class);
	}

	public function sessions()
	{
		return $this->belongsToMany(Session::class);
	}

	// era mucho problema para el dahsboard
	// protected static function booted()
	// {
	// 	static::addGlobalScope(new ActiveScope);
	// }
	public function scopeActive($query)
    {
        $query->where('active', 1);
    }
}
