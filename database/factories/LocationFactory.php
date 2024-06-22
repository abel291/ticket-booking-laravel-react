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
            'name' => $this->faker->streetAddress(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'map' => 'https://goo.gl/maps/5kz8uJCtG8cBMJBL7',
            'active' => 1, //
        ];
    }
}
