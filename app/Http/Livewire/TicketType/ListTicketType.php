<?php

namespace App\Http\Livewire\TicketType;

use App\Http\Traits\WithSorting;
use App\Models\Event;
use App\Models\TicketType;
use App\Scopes\ActiveScope;
use Livewire\Component;
use Livewire\WithPagination;

class ListTicketType extends Component
{
    use WithPagination;
    use WithSorting;

    public $label = 'Entrada';

    public $label_plural = 'Entradas';

    public $event;

    protected $queryString = ['sortBy', 'sortDirection', 'search'];

    protected $listeners = [
        'renderListTicketType' => 'render',
        'resetListTicketType' => 'resetList',
    ];

    public function mount($id)
    {
        $this->event = Event::with('category', 'subCategory')->filterByRole()->findOrFail($id);
    }

    public function render()
    {
        $ticket_types = $this->event->ticket_types()->where('name', 'like', '%' . "$this->search" . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);

        return view('livewire.ticket-type.list-ticket-type', [
            'list' => $ticket_types,
        ]);
    }
}
