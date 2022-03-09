<?php

namespace Database\Factories;

use App\Enums\EventTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $img = rand(1, 20);
        return [
            'slug' => $this->faker->name(),
            'name' => $this->faker->name(),
            'duration' => rand(1, 3) . ' hrs ' . rand(1, 59) . ' mins',
            'des_min' => $this->faker->text(150),
            'des_max' => $this->faker->text(500),
            'tomatoes' => rand(50, 100),
            'audience' => rand(50, 100),
            'calificación' => rand(70, 100),
            'img_banner' => "/img/event/banner/img-" . $img . ".jpg",
            'img_card' => "/img/event/card/img-" . $img . ".jpg",
            'img_thum' => "/img/event/thumb/img-" . $img . ".jpg",
            'ceo_title' => $this->faker->words(3, true),
            'ceo_desc' => $this->faker->sentence(),
            'social_fa' => $this->faker->domainName(),
            'social_tw' => $this->faker->domainName(),
            'social_yt' => $this->faker->domainName(),            
        ];
    }
}
