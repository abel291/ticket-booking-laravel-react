<?php

namespace App\Http\Livewire\User;

use App\Http\Traits\WithSorting;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListUsers extends Component
{
    use WithPagination;
    use WithSorting;

    public $label = 'Usuario';

    public $label_plural = 'Usuarios';

    protected $listeners = [
        'renderListUser' => 'render',
        'resetListUser' => 'resetList',
    ];

    public function render()
    {
        $fields = ['Nombre - email', 'Telefono', ' Ultimo acceso', 'Activo'];
        $data = User::where('name', 'like', '%'.$this->search.'%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        return view('livewire.user.list-user', [
            'data' => $data,
            'fields' => $fields,
            'label' => $this->label,
            'label_plural' => $this->label_plural,
        ]);
    }
}
