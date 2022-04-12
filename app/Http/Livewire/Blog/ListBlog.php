<?php

namespace App\Http\Livewire\Blog;

use App\Http\Traits\WithSorting;
use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class ListBlog extends Component
{
    use WithPagination;
    use WithSorting;
    public $label = 'Post';
    public $label_plural = 'Posts';

    protected $listeners = [
        'renderListBlog' => 'render',
        'resetListBlog' => 'resetList'
    ];

    public function render()
    {
        $data = Blog::where('title', 'like', '%' . $this->search . '%')
            ->with('categories')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(20);

        return view('livewire.blog.list-blog', [
            'data' => $data,
            'label' => $this->label,
            'label_plural' => $this->label_plural
        ]);
    }
}
