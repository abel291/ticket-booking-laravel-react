<?php

namespace App\Http\Livewire\TicketType;

use App\Enums\PaymentStatus;
use App\Enums\TicketTypesEnum;
use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Livewire\Component;

class CreateTicketType extends Component
{
    public $label;

    public $label_plural;

    public $open = false;

    public TicketType $ticket_type;

    public $open_modal_confirmation_delete = false;

    public $event_id;

    public $priceWithFee = 0;

    protected function rules()
    {
        $rules = [
            'ticket_type.name' => 'required|string|max:255',
            'ticket_type.quantity' => 'required|integer|min:1',
            'ticket_type.type' => new Enum(TicketTypesEnum::class),
            'ticket_type.price' => 'required|decimal:0,2|min:0',
            'ticket_type.price_basic' => 'required|numeric|min:0',
            'ticket_type.default' => 'required|boolean',
            'ticket_type.entry' => 'required|string|max:255',
            'ticket_type.min_purchase' => 'required|integer|min:1',
            'ticket_type.max_purchase' => 'required|integer|min:1',
            'ticket_type.show_remaining_entries' => 'required|boolean',
            'ticket_type.active' => 'required|boolean',
            'ticket_type.includeFee' => 'required|boolean',
            'ticket_type.sales_start_date' => 'required|date_format:"Y-m-d H:i:s"',
            'ticket_type.sales_end_date' => 'required|date_format:"Y-m-d H:i:s"',

            'event_id' => [
                'required',
                Rule::exists('events', 'id')->where(function ($query) {
                    return   $query->when(auth()->user()->hasRole('user'), function ($query) {
                        $query->where('user_id', auth()->user()->id);
                    });;
                })
            ],
        ];

        return $rules;
    }

    public function mount()
    {
        $this->ticket_type = TicketType::factory()->make();
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->mount();
    }

    public function save()
    {
        $this->validate();
        $ticket_type = $this->ticket_type;
        $ticket_type->event()->associate($this->event_id);
        $ticket_type->user()->associate(auth()->user()->id);

        if ($ticket_type->type == TicketTypesEnum::FREE) {
            $ticket_type->price = 0;
            $ticket_type->price_basic = 0;
            $ticket_type->includeFee = false;
        } else {
            $ticket_type->calcultePrice();
        }

        $ticket_type->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Agregado',
        ]);

        $this->emit('resetListTicketType');
        $this->reset('open');
        $this->mount();
    }

    public function edit($ticket_type_id)
    {
        $this->ticket_type = TicketType::filterByRole()->findOrFail($ticket_type_id);

        $this->resetErrorBag();
    }

    public function update()
    {

        $this->validate();
        $ticket_type = $this->ticket_type;

        if ($ticket_type->type == TicketTypesEnum::FREE) {
            $ticket_type->price = 0;
            $ticket_type->price_basic = 0;
            $ticket_type->includeFee = false;
        } else {
            $ticket_type->calcultePrice();
        }

        $ticket_type->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Editado',
        ]);

        $this->emit('resetListTicketType');
        $this->reset('open');
        $this->mount();
    }

    public function delete(TicketType $ticket_type)
    {
        $ticket_type->delete();
        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Eliminado',
        ]);
        $this->emit('resetListTicketType');
        $this->reset('open', 'open_modal_confirmation_delete');
        $this->mount();
    }
    public function updatedTicketType(): void
    {

        $this->priceWithFee = $this->ticket_type->calcultePrice();
    }

    public function render()
    {
        return view('livewire.ticket-type.create-ticket-type');
    }
}
