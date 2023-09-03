<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Speaker>
 */
class SpeakerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'name' => $name,
            'slug' => Str::slug($name . "-" . uniqid()),
            'position' => $this->faker->jobTitle(),
            'email' => $this->faker->email(),
            'img' => '/storage/img/speakers/img-' . rand(1, 10) . '.jpg',
            'website' => $this->faker->domainName(),
            'description' => $this->faker->text(400),
            'twitter' => $this->faker->domainName(),
            'instagram' => $this->faker->domainName(),
        ];
    }
}
