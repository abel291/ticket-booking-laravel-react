<?php

namespace App\Http\Livewire\Payment;

use App\Http\Traits\WithSorting;
use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class ListPayment extends Component
{
    use WithPagination;
    use WithSorting;
    public $label = 'Pago';
    public $label_plural = 'Pagos';

    protected $listeners = [
        'renderListPayment' => 'render',
        'resetListPayment' => 'resetList'
    ];
    
    public function render()
    {
        $data = Payment::where('code', 'like', '%' . $this->search . '%')
            ->withCount('tickets','event','user')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);

           // dd($data->first()->tickets);

        return view('livewire.payment.list-payment', [
            'data' => $data,
            'label' => $this->label,
            'label_plural' => $this->label_plural
        ]);        
    }
}
