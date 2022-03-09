<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketType>
 */
class TicketTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'quantity' => rand(200, 500),
            'type' => $this->faker->randomElement(['paid', 'free']),
            'price' => rand(10, 50),
            'price_default' => false,
            'desc' => $this->faker->text(200),
            'min_tickets_purchase' => 1,
            'max_tickets_purchase' => 20,
            'show_remaining_entries' => true,
            'active' => true,

        ];
    }
}
