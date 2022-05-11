<?php

namespace Database\Factories;

use App\Enums\EventTypes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->words(2, true);
        return [
            "name" => ucfirst($name),
            "slug" => Str::slug($name),
            'type' => $this->faker->randomElement([
                EventTypes::EVENT->value,
                EventTypes::SPORT->value,
                EventTypes::MOVIE->value,
            ]),
            "active" => rand(0, 1), //
        ];
    }
}
