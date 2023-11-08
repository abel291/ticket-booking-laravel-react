<?php

namespace App\Http\Livewire\Event;

use App\Http\Traits\WithSorting;
use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class ListEvent extends Component
{
    use WithPagination;
    use WithSorting;

    public $label = 'Evento';

    public $label_plural = 'Eventos';
    protected $queryString = ['sortBy', 'sortDirection', 'search'];
    protected $listeners = [
        'renderListEvent' => 'render',
        'resetListEvent' => 'resetList',
    ];

    public function render()
    {
        $data = auth()->user()->events()->where('title', 'like', '%' . $this->search . '%')
            ->with('category', 'orders')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);

        return view('livewire.event.list-event', [
            'list' => $data,
            'label' => $this->label,
            'label_plural' => $this->label_plural,
        ]);
    }
}
