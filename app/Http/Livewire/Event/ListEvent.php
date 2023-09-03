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
        $hasRole = auth()->user()->hasRole('user');

        $data = Event::where('title', 'like', '%' . $this->search . '%')
            ->when(auth()->user()->hasRole('user'), function ($query, string $role) {
                $query->where('user_id', auth()->user()->id);
            })->with('category', 'payments')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);

        return view('livewire.event.list-event', [
            'list' => $data,
            'label' => $this->label,
            'label_plural' => $this->label_plural,
        ]);
    }
}
