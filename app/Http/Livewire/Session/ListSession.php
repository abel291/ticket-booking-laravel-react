<?php

namespace App\Http\Livewire\Session;

use App\Http\Traits\WithSorting;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class ListSession extends Component
{
    use WithPagination;
    use WithSorting;

    public $label = 'Sesión';

    public $label_plural = 'Sesiones';

    public $event_id;

    protected $listeners = [
        'renderListSession' => 'render',
        'resetListSession' => 'resetList',
    ];

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {	
		
        $sessions = $this->event->sessions()->where('date', 'like', '%'."$this->search".'%')->paginate(20);

        return view('livewire.session.list-session', [
            'data' => $sessions,

        ]);
    }
}
