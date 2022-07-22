<?php

namespace App\Models;

use App\Scopes\ActiveScope;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
	use HasFactory;

	protected $casts = [
		'date' => 'datetime:Y-m-d H:i:s',
	];

	/**
	 * get Time 12 hour
	 *
	 * @return \Illuminate\Database\Eloquent\Casts\Attribute
	 */
	// protected function time(): Attribute
	// {

	//     return Attribute::make(
	//         get: fn ($value) => Carbon::createFromFormat('H:i:s', $value)->format('h:i A'),
	//         set: fn ($value) => Carbon::createFromFormat('h:i A', $value)->format('H:i:00'),
	//     );
	// }

	public function event()
	{
		return $this->belongsTo(Event::class);
	}

	public function ticket_types()
	{
		return $this->belongsToMany(TicketType::class)->withPivot('remaining', 'quantity');
	}

	public function ticket_types_available()
	{
		return $this->belongsToMany(TicketType::class)->withPivot('remaining', 'quantity')->wherePivot('remaining', '>', 0);
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
