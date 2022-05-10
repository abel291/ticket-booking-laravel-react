<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Event;
use App\Models\Session;
use App\Models\Image;
use App\Models\Location;
use App\Models\TicketType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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

        Event::truncate();
        Image::truncate();
        Session::truncate();
        TicketType::truncate();

        // $categories = [
        //     'Ballet',
        //     'Circo',
        //     'Conciertos',
        //     'curso',
        //     'deportes',
        //     'Festivales',
        //     'Monólogo',
        //     'museos',
        //     'Musicales',
        //     'Ópera',
        //     'profesionales',
        //     'Reservas',
        //     'Teatro',
        //     'Turismo',
        // ];

        $location = Location::get();

        $categories = Category::factory(12)
            ->has(
                Event::factory()
                    //->hasImages(3)
                    ->hasSessions(5)
                    ->has(TicketType::factory()->count(5), 'ticket_types')
                    ->count(8)->state(function () use ($location) {
                        return ['location_id' => $location->random()->id];
                    })
            )
            ->create();
    }
}
