<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateCategory extends Component
{
    public $label;

    public $label_plural;

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
        if (config('app.env') != 'testing') {
            $this->category = new Category();
        }

        $this->resetErrorBag();
    }

    public function create()
    {
        $this->mount();
    }

    public function save()
    {
        $this->validate();
        $category = $this->category;
        $category->slug = Str::slug($category->slug);
        $category->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Agregado',
        ]);

        $this->emit('resetListCategory');
        $this->reset('open');
        $this->mount();
    }

    public function edit(Category $category)
    {
        $this->category = $category;
        $this->resetErrorBag();
    }

    public function update()
    {
        $this->rules['category.name'] .= ','.$this->category->id;
        $this->rules['category.slug'] .= ','.$this->category->id;
        $this->validate();

        $category = $this->category;
        $category->slug = Str::slug($category->slug);
        $category->save();

        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Editado',
        ]);

        $this->emit('resetListCategory');
        $this->reset('open');
        $this->mount();
    }

    public function delete(Category $category)
    {
        $category->delete();
        $this->dispatchBrowserEvent('notification', [
            'title' => 'Registro Eliminado',
        ]);
        $this->emit('resetListCategory');
        $this->reset('open', 'open_modal_confirmation_delete');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.category.create-category');
    }
    //
}
