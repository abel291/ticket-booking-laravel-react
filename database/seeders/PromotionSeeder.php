<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Promotion;
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

        $events = Event::get();
        $promotions = Promotion::factory()->count(4)->create();
        foreach ($events as $event) {
            $promotions = Promotion::factory()->count(4)->create();
            $pivot_promotions = [];
            foreach ($promotions as $promotion) {
                $pivot_promotions[$promotion->id] = [
                    'remaining' => $promotion->quantity,
                    'quantity' => $promotion->quantity,
                ];
            }

            $event->promotions()->attach($pivot_promotions);
        }
    }
}
