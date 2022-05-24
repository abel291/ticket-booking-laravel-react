<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name' => $this->faker->name(),
            'position' => $this->faker->jobTitle(),
            'email' => $this->faker->email(),
            'website' => $this->faker->domainName(),
            'desc' => $this->faker->text(400),
            'twitter' => $this->faker->domainName(),
            'instagram' => $this->faker->domainName(),
        ];
    }
}
