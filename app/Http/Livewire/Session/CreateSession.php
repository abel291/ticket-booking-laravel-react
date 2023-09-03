<?php

namespace App\Http\Livewire\Session;

use App\Models\Event;
use App\Models\Session;
use App\Models\TicketType;

use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateSession extends Component
{
    public $label;

    public $label_plural;

    public $open = false;

    public Session $session;

    public $open_modal_confirmation_delete = false;

    public $event_id;

    public $ticket_types;

    public $tickets_type_selected = [];

    protected function rules()
    {
        $rules = [
            'session.date' => 'required|date_format:"Y-m-d H:i:s"',
            'session.active' => 'required|boolean',
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
        $this->session = Session::factory()->make();
        $this->ticket_types = TicketType::where('event_id', $this->event_id)->filterByRole()->get();
        $this->tickets_type_selected = [];
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->mount();
    }

    public function save()
    {
        $this->validate();
        $session = $this->session;
        $session->event_id = $this->event_id;
        $session->user_id = auth()->user()->id;
        $session->save();

        $session->ticket_types()->attach($this->tickets_type_selected);

        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Agregado',
        ]);

        $this->emit('resetListSession');
        $this->reset('open');
        $this->mount();
    }

    public function edit($id_session)
    {
        $this->session = Session::where('event_id', $this->event_id)->filterByRole()->findOrFail($id_session);
        $this->tickets_type_selected = $this->session->ticket_types->pluck('id');
        $this->resetErrorBag();
    }

    public function update()
    {

        $this->validate();
        $session = $this->session;
        $session->load('ticket_types');
        $session->save();

        $session->ticket_types()->syncWithoutDetaching($this->tickets_type_selected);

        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Editado',
        ]);

        $this->emit('resetListSession');
        $this->reset('open');
        $this->mount();
    }

    public function delete(Session $session)
    {
        $session->delete();
        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Eliminado',
        ]);
        $this->emit('resetListSession');
        $this->reset('open', 'open_modal_confirmation_delete');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.session.create-session');
    }
}
