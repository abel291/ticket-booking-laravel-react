<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promotion::truncate();
        DB::table('event_promotion')->truncate();
        $promotions = Promotion::factory(20)->create();

        $events = Event::get();

        foreach ($promotions as $promotion) {
            $promotion->events()->attach($events->random(4)->pluck('id')->toArray());
        }
    }
}
