<?php

namespace Tests\Feature;

use App\Http\Livewire\Category\CreateCategory;
use App\Http\Livewire\Category\ListCategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DashboardCategoryTest extends TestCase
{
    use RefreshDatabase;    

    public function test_category_list()
    {
        //$this->withoutExceptionHandling();
        $this->actingAs(User::first());
        Livewire::test(ListCategory::class)->call('render');
    }

    public function test_category_create()
    {
        
        $this->actingAs(User::first());
        Livewire::test(CreateCategory::class)->call('create');
    }

    public function test_category_save()
    {
        
        $this->actingAs(User::first());

        $category = Category::factory()->make();        
        Livewire::test(CreateCategory::class, ["category" => $category])
            ->call('update')
            ->assertHasNoErrors(['category'])
            ->assertDispatchedBrowserEvent('notification');
    }

    public function test_category_edit()
    {
        
        $this->actingAs(User::first());
        $category = Category::get()->random();
        Livewire::test(CreateCategory::class)->call('edit', $category->id);
    }
    public function test_category_update()
    {
        $user = User::first();
        $this->actingAs(User::first());

        $category = Category::get()->random();

        Livewire::test(CreateCategory::class, ["category" => $category])
            ->call('update')
            ->assertHasNoErrors(['category'])
            ->assertDispatchedBrowserEvent('notification');
    }
    public function test_category_delele()
    {
        
        $this->actingAs(User::first());
        $category = Category::get()->random();
        Livewire::test(CreateCategory::class)->call('delete', $category->id)
            ->assertDispatchedBrowserEvent('notification');
    }
}
