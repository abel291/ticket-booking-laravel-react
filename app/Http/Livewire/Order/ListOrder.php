<?php

namespace App\Http\Livewire\Order;

use App\Http\Traits\WithSorting;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class ListOrder extends Component
{
    use WithPagination;
    use WithSorting;

    public $label = 'Pago';

    public $label_plural = 'Pagos';

    protected $listeners = [
        'renderListOrder' => 'render',
        'resetListOrder' => 'resetList',
    ];

    public function render()
    {
        $data = Order::where('code', 'like', '%' . $this->search . '%')
            ->with('event', 'user')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);



        return view('livewire.order.list-order', [
            'list' => $data,
            'label' => $this->label,
            'label_plural' => $this->label_plural,
        ]);
    }
}
