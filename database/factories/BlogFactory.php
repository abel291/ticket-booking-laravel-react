<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            "title" => $name,
            "slug" => Str::slug($name),
            "img" => "/img/blog/img-" . rand(1, 20) . ".jpg",
            "desc_min" => $this->faker->text(150),
            "desc_max" => $this->faker->text(1000),
        ];
    }
}
