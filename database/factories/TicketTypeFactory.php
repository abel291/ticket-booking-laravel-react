<?php

namespace Database\Factories;

use App\Enums\TicketTypes;
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
            'name' => ucfirst($this->faker->word()),
            'quantity' => rand(200, 500),
            'type' => $this->faker->randomElement([TicketTypes::FREE->value, TicketTypes::PAID->value]),
            'price' => rand(10, 50),
            'default' => rand(0,1),
            'desc' => $this->faker->text(200),
            'min_tickets_purchase' => 1,
            'max_tickets_purchase' => 20,
            'show_remaining_entries' => rand(0,1),
            'active' => rand(0,1),

        ];
    }
}
