<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->buildingNumber() . " " . $this->faker->streetName(),
            "address" => $this->faker->address(), //
            "phone" => $this->faker->phoneNumber(), //

            'map' => 'https://www.google.com/maps/place/Bennelong+Lawn/@-33.8584612,151.2167711,17z/data=!4m13!1m7!3m6!1s0x6b129838f39a743f:0x3017d681632a850!2sSídney+Nueva+Gales+del+Sur,+Australia!3b1!8m2!3d-33.8688197!4d151.2092955!3m4!1s0x6b12ae6b5e061497:0xb7f8fbcff80333d6!8m2!3d-33.858559!4d151.2148494?hl=es',
            "active" => rand(0, 1), //
        ];
    }
}
