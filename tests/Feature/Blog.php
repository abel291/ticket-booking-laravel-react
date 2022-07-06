<?php

namespace Tests\Feature;

use App\Http\Livewire\Blog\CreateBlog;
use App\Http\Livewire\Blog\ListBlog;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_list()
    {
        $this->actingAs(User::first());
        Livewire::test(ListBlog::class)->call('render');
    }

    public function test_blog_create()
    {
        $this->actingAs(User::first());
        Livewire::test(CreateBlog::class)->call('create');
    }

    public function test_blog_save()
    {
        ////$this->withoutExceptionHandling();
        $this->actingAs(User::first());

        $blog = Blog::factory()->make();
        $categories = Category::get()->random(5)->pluck('id')->toArray();

        Storage::fake('public');
        $image = UploadedFile::fake()->image('avatar.jpg');

        Livewire::test(CreateBlog::class, ['blog' => $blog])
            ->set('image', $image)
            ->set('categories', $categories)
            ->call('save')
            ->assertHasNoErrors(['blog', 'categories', 'image'])
            ->assertDispatchedBrowserEvent('notification');
    }

    public function test_blog_edit()
    {
        $this->actingAs(User::first());
        $blog = Blog::get()->random();
        Livewire::test(CreateBlog::class)->call('edit', $blog->id);
    }

    public function test_blog_update()
    {
        //$this->withoutExceptionHandling();

        $this->actingAs(User::first());

        Storage::fake('public');
        $image = UploadedFile::fake()->image('avatar.png');
        $blog = Blog::get()->random();
        $categories = Category::get()->random(5)->pluck('id')->toArray();

        Livewire::test(CreateBlog::class, ['blog' => $blog])
            ->set('image', $image)
            ->set('categories', $categories)
            ->call('update')
            ->assertHasNoErrors(['blog', 'categories', 'image'])
            ->assertDispatchedBrowserEvent('notification');
    }

    public function test_blog_delele()
    {
        //$this->withoutExceptionHandling();

        $this->actingAs(User::first());
        $blog = Blog::get()->random();
        Livewire::test(CreateBlog::class)->call('delete', $blog->id)
            ->assertDispatchedBrowserEvent('notification');
    }
}
