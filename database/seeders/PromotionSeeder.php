<?php

namespace Database\Seeders;

use App\Models\Promotion;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        Promotion::factory(20)->create();
    }
}
