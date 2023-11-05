<?php

namespace App\Http\Livewire\Speaker;

use App\Http\Traits\WithSorting;
use App\Models\Event;
use App\Models\Speaker;
use Livewire\Component;
use Livewire\WithPagination;

class ListSpeaker extends Component
{
    use WithPagination;
    use WithSorting;
    public $event_id;
    public $event;

    public $label = 'Orador';
    public $label_plural = 'Oradores';

    protected $listeners = [
        'renderListSpeaker' => 'render',
        'resetListSpeaker' => 'resetList',
    ];

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        $data = Speaker::where('name', 'like', '%' . "$this->search" . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);

        return view('livewire.speaker.list-speaker', [
            'data' => $data,
        ]);
    }
}
