<?php

namespace Database\Factories;

use App\Enums\TicketTypesEnum;
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
        $type = $this->faker->randomElement([TicketTypesEnum::FREE->value, TicketTypesEnum::PAID->value]);
        $price = $type == 'free' ? 0 : rand(1, 15);

        return [
            'name' => ucfirst($this->faker->word()),
            'quantity' => rand(200, 500),
            'type' => $type,
            'price' => $price,
            'default' => rand(0, 1),
            'desc' => $this->faker->text(200),
            'min_tickets_purchase' => 1,
            'max_tickets_purchase' => 20,
            'show_remaining_entries' => rand(0, 1),
            'active' => 1,

        ];
    }
}
