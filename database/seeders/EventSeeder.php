<?php

namespace Database\Seeders;

use App\Enums\CategoryType;
use App\Models\Category;
use App\Models\Event;
use App\Models\Format;
use App\Models\Image;
use App\Models\Location;
use App\Models\Session;
use App\Models\Speaker;
use App\Models\TicketType;
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

        foreach (Category::where('type',CategoryType::EVENT)->get() as $category) { //category -> 14
            Event::factory(5)
                ->hasImages(5)
                ->hasSessions(8)
                ->hasSpeakers(8)
                ->has(TicketType::factory()->count(8), 'ticket_types')
                ->state(function () use ($locations, $formats, $category) {
                    return [
                        'location_id' => $locations->random()->id,
                        'format_id' => $formats->random()->id,
                        'category_id' => $category->id,
                    ];
                })
                ->create();
        }
    }
}
