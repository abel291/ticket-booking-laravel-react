<?php

namespace App\Http\Livewire\Order;

use App\Enums\OrderStatus;
use App\Models\Order;
use Livewire\Component;

class ShowOrder extends Component
{
    public $open = false;

    public Order $order;

    public $open_modal_confirmation = false;

    public $refund_checkbox = false;

    protected $rules = [
        'payment.status' => 'required|string|max:255',
    ];

    public function mount($code)
    {
        $order = Order::with('event', 'order_tickets', 'user')->where('code', $code)->firstOrFail();

        $this->order = $order;
    }

    public function delete(Order $order)
    {
        $order->status = $this->refund_checkbox ? OrderStatus::REFUNDED : OrderStatus::CANCELED;
        $order->save();

        $this->order = $order;

        $this->dispatchBrowserEvent('notification', [
            'title' => 'pago Cancelada',
            'subtitle' => 'El Pago  <b>' . $this->order->code . '</b>  a sido  ' . $this->order->status->text(),
        ]);
        $this->emit('resetListOrder');
        $this->open_modal_confirmation = false;
    }

    public function render()
    {
        return view('livewire.order.show-order');
    }
}
