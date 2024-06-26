<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //dd(EventTypes::Event->value);
        Schema::disableForeignKeyConstraints();
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            FormatSeeder::class,
            EventSeeder::class,
            SessionTicketsSeeder::class,
            BlogSeeder::class,
            PromotionSeeder::class,
            SpeakerSeeder::class,
            // OrderSeeder::class,

        ]);
        Schema::enableForeignKeyConstraints();
    }
}
