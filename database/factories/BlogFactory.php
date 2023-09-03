<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);

        return [
            'title' => ucfirst($name),
            'slug' => Str::slug($name),
            'image' => '/images/img-' . rand(1, 5) . '.jpg',
            'active' => rand(0, 1),
            'entry' => $this->faker->text(150),
            'description' => $this->faker->text(1000),
        ];
    }
}
