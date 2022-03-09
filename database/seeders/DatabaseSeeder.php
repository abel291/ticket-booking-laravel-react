<?php

namespace Database\Seeders;

use App\Models\TicketType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        User::truncate();
        User::factory(10)->create();
        $this->call([
            LocationSeeder::class,
            CategorySeeder::class, // products and posts
            TicketTypeSeeder::class,
            PaymentSeeder::class

            //PromoCodeSeeder::class,

        ]);
    }
}
