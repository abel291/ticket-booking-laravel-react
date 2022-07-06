<?php

namespace App\Http\Livewire\Category;

use App\Http\Traits\WithSorting;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ListCategory extends Component
{
    use WithPagination;
    use WithSorting;

    public $label = 'Categoria';

    public $label_plural = 'Categorias';

    protected $listeners = [
        'renderListCategory' => 'render',
        'resetListCategory' => 'resetList',
    ];

    public function render()
    {
        $fields = ['Nombre - slug', 'Activo', ' Ultima Modificacion'];
        $data = Category::where('name', 'like', '%'.$this->search.'%')
            ->withCount('events')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(10);

        return view('livewire.category.list-category', [
            'data' => $data,
            'fields' => $fields,
            'label' => $this->label,
            'label_plural' => $this->label_plural,
        ]);
    }
}
