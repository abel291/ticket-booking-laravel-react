<?php

namespace Database\Seeders;

use App\Enums\CategoryType;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Event;
use App\Models\Format;
use App\Models\Session;
use App\Models\Image;
use App\Models\Location;
use App\Models\TicketType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'deportes',
            'Festivales',
            'Monólogo',
            'Museos',
            'Musicales',
            'Ópera',
            'profesionales',
            'Reservas',
            'Teatro',
            'Turismo',
        ];

        //event
        foreach ($categories as $key => $value) {
            Category::factory()->create([
                "name" => ucfirst($value),
                "slug" => Str::slug($value),
                'type' => CategoryType::EVENT
            ]);
        }

        //blog
        Category::factory(12)->state([
            'type' => CategoryType::BLOG
        ])->create();
    }
}
