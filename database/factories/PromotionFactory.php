<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->regexify('[A-Z]{5}[0-9]{3}'),
            'type' => $this->faker->randomElement(['amount', 'percent']),
            'value' => rand(1, 100),
            'quantity' => rand(1, 100),
            'expired' => $this->faker->dateTimeBetween('now', '+4 week'),
            'entry' => $this->faker->sentence(),
        ];
    }
}
