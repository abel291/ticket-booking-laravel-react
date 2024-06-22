<?php

namespace Database\Seeders;

use App\Enums\CategoryType;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $categories = [
            'Ballet' => 'gray',
            'Circo' => 'red',
            'Conciertos' => 'yellow',
            'Curso' => 'green',
            'Deportes' => 'blue',
            'Festivales' => 'indigo',
            'Monólogo' => 'purple',
            'Museos' => 'pink',
            'Musicales' => 'orange',
            'Ópera' => 'rose',
            'Profesionales' => 'fuchsia',
            'Teatro' => 'violet',
            'Turismo' => 'sky',
            'Peliculas' => 'teal',
        ];



        //event
        foreach ($categories as $category => $color) {
            $slug = Str::slug($category);
            Category::factory()
                ->has(Category::factory()->count(3), 'subCategories')
                ->create([
                    'name' => ucfirst($category),
                    'slug' => $slug,
                    'color' => $color,
                    'img' => '/img/categories/' . $slug . '.jpg',
                ]);
        }
    }
}
