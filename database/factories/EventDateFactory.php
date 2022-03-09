<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class EventDateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'times' => [
                $this->faker->time('h:i a'),
                $this->faker->time('h:i a'),
                $this->faker->time('h:i a'),
                $this->faker->time('h:i a'),
                $this->faker->time('h:i a'),
            ]

        ];
    }
}
