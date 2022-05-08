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
            "name" => $this->faker->buildingNumber()." ".$this->faker->streetName(),
            "address" => $this->faker->address(), //
            "phone" => $this->faker->phoneNumber(), //
            "active" => rand(0,1), //
        ];
    }
}
