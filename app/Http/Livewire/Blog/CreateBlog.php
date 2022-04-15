<?php

namespace App\Http\Livewire\Blog;

use App\Helpers\Helpers;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Enum;
use Livewire\WithFileUploads;
use Spatie\Image\Image as SpatieImage;

class CreateBlog extends Component
{
    use WithFileUploads;
    public $label;
    public $label_plural;
    public $open = false;
    public Blog $blog;
    public $open_modal_confirmation_delete = false;
    public $categories = [];
    public $image;

    protected $rules = [
        'blog.title'        => 'required|string|max:255',
        'blog.slug'         => 'required|string|max:255',
        //'blog.img'        => 'required|string|max:2000',
        'blog.desc_min'     => 'required|string|max:255',
        'blog.desc_max'     => 'required|string|max:1000',
        'blog.active'       => 'required|boolean',
        'image'       => 'required|image|max:1024',
        'categories.*'  => 'required|distinct',
    ];


    public function mount()
    {
        $this->reset('image', 'categories');
        if (config('app.env') != 'testing') {
            $this->category = new Blog();
        }
        $this->categories = Category::get()->random(5)->pluck('id')->toArray();
        $this->resetErrorBag();
    }

    public function create()
    {
        $this->mount();
    }

    public function save()
    {
        $this->validate();
        $blog = $this->blog;
        $blog->slug = Str::slug($blog->slug);

        $blog->save();

        $name_img = Helpers::generate_img_name($blog->slug, $this->image->extension());
        $blog->addMedia($this->image->getRealPath())
            ->usingName('blog-' . $blog->slug)
            ->usingFileName($name_img)
            ->toMediaCollection('image');

        $blog->categories()->sync($this->categories);

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Agregado",
        ]);

        $this->emit('resetListBlog');
        $this->reset('open');
        $this->mount();
        
    }

    public function edit(Blog $blog)
    {
        $this->blog = $blog;
        $this->categories = $blog->categories->pluck('id')->toArray();
        $this->reset('image');
        $this->resetErrorBag();
    }

    public function update()
    {
        $this->rules['image'] = 'nullable|image|max:1000';
        $this->validate();
        $blog = $this->blog;

        $blog->slug = Str::slug($blog->slug);
        $blog->save();
        $blog->categories()->sync($this->categories);

        if ($this->image) {
            $blog->clearMediaCollection('image');
            $name_img = Helpers::generate_img_name($blog->slug, $this->image->extension());
            $blog->addMedia($this->image->getRealPath())
                ->usingName('blog-' . $blog->slug)
                ->usingFileName($name_img)
                ->toMediaCollection('image');
        }

        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Editado",
        ]);

        $this->emit('resetListBlog');
        $this->reset('open');
        $this->mount();
    }

    public function delete(Blog $blog)
    {
        $blog->delete();
        $this->dispatchBrowserEvent('notification', [
            'title' => "Registro Eliminado",
        ]);
        $this->emit('resetListBlog');
        $this->reset('open', 'open_modal_confirmation_delete');
        $this->mount();
    }
    public function updateImage(): void
    {
        $this->validate([
            'image' => 'image|max:2048|mimes:jpeg,jpg,png',
        ]);

        // File is an image that is < 10mb
    }
    public function render()
    {
        return view('livewire.blog.create-blog');
    }

    //termianr el form de blog vovler a intalar spatie
}
