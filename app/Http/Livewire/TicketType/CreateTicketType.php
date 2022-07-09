<?php

namespace App\Http\Livewire\TicketType;

use App\Enums\TicketTypesEnum;
use App\Models\TicketType;
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

    protected function rules()
    {
        $rules = [
            'ticket_type.name' => 'required|string|max:255',
            'ticket_type.quantity' => 'required|integer|min:1',
            'ticket_type.type' => new Enum(TicketTypesEnum::class),
            'ticket_type.price' => 'required|integer|min:0',
            'ticket_type.default' => 'required|boolean',
            'ticket_type.desc' => 'required|string|max:255',
            'ticket_type.min_tickets_purchase' => 'required|integer|min:1',
            'ticket_type.max_tickets_purchase' => 'required|integer|min:1',
            'ticket_type.show_remaining_entries' => 'required|boolean',
            'ticket_type.active' => 'required|boolean',
            'event_id' => 'required|exists:App\Models\Event,id',
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
        $ticket_type->event_id = $this->event_id;
        $ticket_type->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Agregado',
        ]);

        $this->emit('resetListTicketType');
        $this->reset('open');
        $this->mount();
    }

    public function edit(TicketType $ticket_type)
    {
        $this->ticket_type = $ticket_type;
        $this->resetErrorBag();
    }

    public function update()
    {
        $this->validate();
        $ticket_type = $this->ticket_type;
		//$ticket_type->active=0;
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

    public function render()
    {
        return view('livewire.ticket-type.create-ticket-type');
    }
}
