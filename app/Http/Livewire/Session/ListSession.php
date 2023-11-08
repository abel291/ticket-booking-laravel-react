<?php

namespace App\Http\Livewire\Session;

use App\Http\Traits\WithSorting;
use App\Models\Event;
use App\Models\Session;
use Livewire\Component;
use Livewire\WithPagination;

class ListSession extends Component
{
    use WithPagination;
    use WithSorting;

    public $label = 'Sesión';

    public $label_plural = 'Sesiones';

    public $event;

    protected $queryString = ['sortBy', 'sortDirection', 'search'];

    protected $listeners = [
        'renderListSession' => 'render',
        'resetListSession' => 'resetList',
    ];

    public function mount($id)
    {
        $this->event = auth()->user()->events()
            ->with('category', 'subCategory')
            ->findOrFail($id);
    }

    public function render()
    {

        $sessions = Session::with('ticket_types:id,name,price')->where('event_id', $this->event->id)
            ->where('date', 'like', '%' . "$this->search" . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);

        return view('livewire.session.list-session', [
            'list' => $sessions,
        ]);
    }
}
