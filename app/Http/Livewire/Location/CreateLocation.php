<?php

namespace App\Http\Livewire\Location;

use App\Models\Location;
use Livewire\Component;

class CreateLocation extends Component
{
    public $label;

    public $label_plural;

    public $open = false;

    public Location $location;

    public $open_modal_confirmation_delete = false;

    protected $rules = [
        'location.name' => 'required|string|max:255',
        'location.address' => 'required|string|max:255',
        'location.phone' => 'required|string|max:50',
        'location.active' => 'required|boolean',
    ];

    public function mount()
    {
        $this->location = new Location();
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->mount();
    }

    public function save()
    {
        $this->validate();
        $location = $this->location;
        $location->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Agregado',
        ]);

        $this->emit('resetListLocation');
        $this->reset('open');
        $this->mount();
    }

    public function edit(Location $location)
    {
        $this->location = $location;
        $this->resetErrorBag();
    }

    public function update()
    {
        $this->validate();
        $location = $this->location;
        $location->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Editado',
        ]);

        $this->emit('resetListLocation');
        $this->reset('open');
        $this->mount();
    }

    public function delete(Location $location)
    {
        $location->delete();
        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Eliminado',
        ]);
        $this->emit('resetListLocation');
        $this->reset('open', 'open_modal_confirmation_delete');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.location.create-location');
    }
}
