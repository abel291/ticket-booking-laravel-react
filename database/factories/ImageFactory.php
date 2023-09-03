<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Images>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'alt' => $this->faker->sentence(3),
            'title' => $this->faker->sentence(3),
            'img' => '/storage/img/images/img-' . rand(1, 8) . '.jpg',
        ];
    }
}
