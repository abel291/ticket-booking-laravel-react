<?php

namespace Database\Seeders;

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
            LocationSeeder::class,
            CategorySeeder::class,
            FormatSeeder::class,
            EventSeeder::class,
            PivotSessionTicketTypesSeeder::class,
            BlogSeeder::class,
            PromotionSeeder::class,
            //PaymentSeeder::class,
            ImageSeeder::class,
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
