<?php

namespace App\Http\Livewire\Promotion;

use App\Http\Traits\WithSorting;
use App\Models\Promotion;
use Livewire\Component;
use Livewire\WithPagination;

class ListPromotion extends Component
{
    use WithPagination;
    use WithSorting;

    public $label = 'Promocion';

    public $label_plural = 'Promociones';

    protected $listeners = [
        'renderListPromotion' => 'render',
        'resetListPromotion' => 'resetList',
    ];

    public function render()
    {
        $data = Promotion::where('code', 'like', '%'.$this->search.'%')
            ->withCount('events')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);

        return view('livewire.promotion.list-promotion', [
            'data' => $data,
            'label' => $this->label,
            'label_plural' => $this->label_plural,
        ]);
    }
}
