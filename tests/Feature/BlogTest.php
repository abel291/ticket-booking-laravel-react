<?php

namespace Tests\Feature;

use App\Http\Livewire\Blog\CreateBlog;
use App\Http\Livewire\Blog\ListBlog;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Debug\ExceptionHandler;

class BlogTest extends TestCase
{

    public function test_blog_list()
    {
        $user = User::factory()->make();
        $this->actingAs($user);

        Livewire::test(ListBlog::class)->call('render');
    }

    public function test_blog_create()
    {
        $user = User::factory()->make();
        $this->actingAs($user);

        Livewire::test(CreateBlog::class)->call('create');
    }

    public function test_blog_save()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->make();
        $this->actingAs($user);

        Storage::fake('avatars');
        $image = UploadedFile::fake()->image('avatar.png');

        $blog = Blog::factory()->make();
        $categories = Category::get()->random(5)->pluck('id')->toArray();

        Livewire::test(CreateBlog::class, [
            'blog' => $blog,
            'categories' => $categories,
            'image' => $image
        ])->call('save')
            ->assertHasNoErrors(['blog', 'categories']);
    }
}