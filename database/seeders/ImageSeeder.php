<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // DB::table('media')->truncate();
        // foreach(Event::get() as $event){
        //     $imageUrl=url('img/events/img-' . rand(1, 8) . '.jpg');
        //     $event->addMediaFromUrl($imageUrl)->toMediaCollection('card');
        // }
    }
}
