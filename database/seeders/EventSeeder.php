<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use App\Models\Format;
use App\Models\Image;
use App\Models\Location;
use App\Models\Session;
use App\Models\Speaker;
use App\Models\TicketType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Event::truncate();
        Session::truncate();
        TicketType::truncate();
        Speaker::truncate();
        Image::truncate();

        $locations = Location::get();
        $formats = Format::get();

        foreach (Category::get() as $key => $category) {
            Event::factory(20)
                ->hasImages(8)
                ->hasSessions(8)
                ->hasSpeakers(8)
                ->has(TicketType::factory()->count(10), 'ticket_types')
                ->state(function () use ($locations, $formats, $category) {
                    return [
                        'location_id' => $locations->random()->id,
                        'format_id' => $formats->random()->id,
                        'category_id' => $category->id
                    ];
                })
                ->create();
        }
    }
}
