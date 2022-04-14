<?php

namespace App\Http\Livewire\Session;


use App\Models\Session;
use Livewire\Component;
class CreateSession extends Component
{
    public $label;
    public $label_plural;
    public $open = false;
    public Session $session;
    public $open_modal_confirmation_delete = false;
    public $event_id;
    protected function rules()
    {
        $rules = [
            'session.date' => 'required|date_format:"Y-m-d"',
            'session.time' => 'required|date_format:"h:i A"',           
            'session.active' => 'required|boolean',
            'event_id' => 'required|exists:App\Models\Event,id',
        ];
        return $rules;
    }

    public function mount()
    {

        $this->session = Session::factory()->make();
        
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
        $session->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Agregado",
        ]);

        $this->emit('resetListSession');
        $this->reset('open');
        $this->mount();
    }
    public function edit(Session $session)
    {
        $this->session = $session;
        $this->resetErrorBag();
    }
    public function update()
    {   

        //dd($this->session->date);
        $this->validate();
        
        $session = $this->session;
        $session->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Editado",
        ]);

        $this->emit('resetListSession');
        $this->reset('open');
        $this->mount();
    }

    public function delete(Session $session)
    {   
        $session->delete();
        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Eliminado",
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
