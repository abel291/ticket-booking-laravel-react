<?php

namespace Database\Factories;

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
            'name' => $this->faker->buildingNumber().' '.$this->faker->streetName(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'map' => 'https://www.google.com/maps/@40.7749985,-73.9822853,3a,75y,289.07h,97.45t/data=!3m6!1e1!3m4!1sSGtYy3nR-jlb8iAg144LXA!2e0!7i16384!8i8192',
            'active' => 1, //
        ];
    }
}
