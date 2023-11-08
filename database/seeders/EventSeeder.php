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
use App\Models\User;
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
        Image::truncate();

        $formats = Format::get();
        $categories =  Category::whereNull('category_id')->with('subCategories')->get();
        $users = User::with('locations')->get();

        foreach ($users as  $user) {

            Event::factory(5)
                ->hasImages(7)
                ->has(
                    Session::factory()->state([
                        'user_id' => $user->id
                    ])->count(rand(1, 4))
                )
                ->has(
                    TicketType::factory()->state([
                        'user_id' => $user->id
                    ])->count(rand(1, 4)),
                    'ticket_types'
                )
                ->state(function () use ($formats, $categories, $user) {
                    $category = $categories->random();

                    return [
                        'location_id' => $user->locations->random()->id,
                        'format_id' => $formats->random()->id,
                        'category_id' => $category->id,
                        'sub_category_id' => $category->subCategories->random()->id,
                        'user_id' => $user->id,
                    ];
                })
                ->create();
        }
    }
}
