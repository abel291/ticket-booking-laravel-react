<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Event;
use App\Models\EventDate;
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
        Blog::truncate();
        Event::truncate();
        Image::truncate();
        EventDate::truncate();
        TicketType::truncate();

        $location = Location::get();
        Category::factory(1)
            ->has(Blog::factory()->hasImages(3)->count(1), 'posts')
            ->has(
                Event::factory()
                    ->hasImages(3)
                    ->hasDates(5)
                    ->has(TicketType::factory()->count(3),'ticket_types')
                    ->count(3)->state(function () use ($location) {
                        return ['location_id' => $location->random()->id];
                    })
            )
            ->create();
    }
}
