<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateCategory extends Component
{
    public $label;
    public $label_plural;
    public $edit_var = false;
    public $open = false;
    public Category $category;
    public $open_modal_confirmation_delete = false;
    protected $rules = [
        'category.name' => 'required|string|max:255|unique:categories,name',
        'category.slug' => 'required|string|max:255|unique:categories,slug',
        'category.active' => 'required|boolean',
    ];
    public function mount()
    {
        $this->category = new Category();
    }

    public function create()
    {
        $this->mount();
        $this->reset('edit_var');
        $this->resetErrorBag();
    }
    public function save()
    {
        $this->validate();
        $category = $this->category;
        $category->slug = Str::slug($category->slug);
        $category->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Agregado",
        ]);

        $this->reset('edit_var', 'open');
        $this->emit('resetListCategory');
        $this->mount();
    }
    public function edit(Category $category)
    {
        $this->edit_var = true;
        $this->category = $category;
        $this->resetErrorBag();
    }
    public function update()
    {
        $this->validate();
        $category = $this->category;
        $category->slug = Str::slug($category->slug);
        $category->save();

        $this->emit('resetListCategory');
        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Editado",

        ]);
        $this->reset('edit_var', 'open');
        $this->mount();
    }
    public function render()
    {
        return view('livewire.category.create-category');
    }
}
