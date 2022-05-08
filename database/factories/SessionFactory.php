<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class SessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        
        return [
            'date' => $this->faker->dateTimeBetween('now', '+1 week')->format('Y-m-d'),
            'time' => $this->faker->time('h:i A'),
            'active' => rand(0, 1)

        ];
    }
}
