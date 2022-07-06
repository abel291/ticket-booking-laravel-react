<?php

namespace App\Http\Livewire\Payment;

use App\Enums\PaymentStatus;
use App\Models\Payment;
use Livewire\Component;

class ViewPayment extends Component
{
    public $open = false;

    public Payment $payment;

    public $open_modal_confirmation = false;

    public $refund_checkbox = false;

    protected $rules = [
        'payment.status' => 'required|string|max:255',
    ];

    public function mount(Payment $payment)
    {
        $payment->load('event', 'user');
        $this->payment = $payment;
    }

    public function delete(Payment $payment)
    {
        $payment->status = $this->refund_checkbox ? PaymentStatus::REFUNDED : PaymentStatus::CANCELED;
        $payment->save();

        $this->payment = $payment;

        $this->dispatchBrowserEvent('notification', [
            'title' => 'pago Cancelada',
            'subtitle' => 'El Pago  <b>'.$this->payment->code.'</b>  a sido  '.$this->payment->status->text(),
        ]);
        $this->emit('resetListPayment');
        $this->open_modal_confirmation = false;
    }

    public function render()
    {
        return view('livewire.payment.view-payment');
    }
}
