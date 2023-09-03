<?php

namespace App\Http\Livewire\Speaker;

use App\Models\Speaker;
use Livewire\Component;
use App\Http\Traits\WithSorting;
use App\Models\Event;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class ListAvailablesSpeaker extends Component
{
	use WithPagination;
	use WithSorting;
	public $event_id;

	public $label;

	public $label_plural;

	public $open = false;

	public function store(Speaker $speaker)
	{
		$speaker->events()->attach($this->event_id);
		$this->emit('resetListSpeaker');
		//$this->reset('open');
	}

	public function render()
	{

		$data = Speaker::where('name', 'like', '%' . "$this->search" . '%')
			->whereDoesntHave('events', function (Builder $query) {
				$query->where('event_id', $this->event_id);
			})
			->paginate(10);


		return view('livewire.speaker.list-availables-speaker', [
			'data' => $data,

		]);
	}
}
