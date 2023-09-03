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
            'Ballet',
            'Circo',
            'Conciertos',
            'Curso',
            'Deportes',
            'Festivales',
            'Monólogo',
            'Museos',
            'Musicales',
            'Ópera',
            'Profesionales',
            'Teatro',
            'Turismo',
            'Peliculas',
        ];

        //event
        foreach ($categories as $key => $value) {
            $slug = Str::slug($value);
            Category::factory()
                ->has(Category::factory()->count(3), 'subCategories')
                ->create([
                    'name' => ucfirst($value),
                    'slug' => $slug,
                    'img' => '/img/categories/' . $slug . '.jpg',
                ]);
        }
    }
}
