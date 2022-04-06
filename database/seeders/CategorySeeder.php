<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Event;
<<<<<<< HEAD

=======
use App\Models\Session;
>>>>>>> dashboard-tailwind
use App\Models\Image;
use App\Models\Location;
use App\Models\Session;
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
        Blog::truncate();
        Event::truncate();
        Image::truncate();
        Session::truncate();
        TicketType::truncate();

        $location = Location::get();
<<<<<<< HEAD
        $categories = [
            'Ballet',
            'Circo',
            'Conciertos',
            'Curso',
            'Deportes',
            'Festivales',
            'Monólogo',
            'museos',
            'Musicales',
            'Ópera',
            'Profesionales',
            'Teatro',
        ];

        foreach ($categories as $key => $category) {
            Category::factory()
                ->state([
                    'name' => $category,
                    'slug' => Str::slug($category)
                ])
                ->has(Blog::factory()->count(1), 'posts')
                ->has(
                    Event::factory()
                        ->hasImages(3)                        
                        ->hasSessions(3)                        
                        ->has(TicketType::factory()->count(3), 'ticket_types')
                        ->count(8)->state(function () use ($location) {
                            return ['location_id' => $location->random()->id];
                        })
                )
                ->create();
        }
=======
        Category::factory(12)
            ->has(Blog::factory()->hasImages(3)->count(1), 'posts')
            ->has(
                Event::factory()
                    ->hasImages(3)
                    ->hasSessions(5)
                    ->has(TicketType::factory()->count(3),'ticket_types')
                    ->count(8)->state(function () use ($location) {
                        return ['location_id' => $location->random()->id];
                    })
            )
            ->create();
>>>>>>> dashboard-tailwind
    }
}

//volver a colocar la tabla pivot ticket_type y session
