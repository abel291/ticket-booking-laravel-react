<?php

namespace App\Http\Livewire\Location;

use App\Http\Traits\WithSorting;
use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;

class ListLocation extends Component
{
    use WithPagination;
    use WithSorting;

    public $label = 'Ubicacion';

    public $label_plural = 'Ubicaciones';

    protected $listeners = [
        'renderListLocation' => 'render',
        'resetListLocation' => 'resetList',
    ];

    public function render()
    {
        $data = Location::where('name', 'like', '%'.$this->search.'%')
            ->withCount('events')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);

        return view('livewire.location.list-location', [
            'data' => $data,
            'label' => $this->label,
            'label_plural' => $this->label_plural,
        ]);
    }
}
