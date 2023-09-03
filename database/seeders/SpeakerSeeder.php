<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Promotion;
use App\Models\Speaker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speaker::truncate();
        DB::table('event_speaker')->truncate();
        $events = Event::get();
        $speakers = Speaker::factory()->count(500)->create();
        foreach ($events as $event) {
            $event->speakers()->attach($speakers->random(3)->pluck('id'));
        }
    }
}
