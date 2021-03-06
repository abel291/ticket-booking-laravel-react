<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $card = '/events/img-'.rand(1, 20).'.jpg';
        $title = $this->faker->sentence(4);

        return [
            'title' => ucfirst($title),
            'slug' => Str::slug($title),
            'duration' => rand(1, 3).' hrs '.rand(1, 59).' mins',
            'desc_min' => $this->faker->text(250),
            'desc_max' => $this->faker->text(500),
            'card' => '/img/events/img-'.rand(1, 20).'.jpg',
            //'thumb' => '/img/events/img-'.rand(1, 20).'.jpg',
            'banner' => '/img/events/banners/carousel-'.rand(1, 9).'.jpg',
            'ceo_title' => $this->faker->words(3, true),
            'ceo_desc' => $this->faker->sentence(),
            'social_fa' => $this->faker->domainName(),
            'social_tw' => $this->faker->domainName(),
            'social_yt' => $this->faker->domainName(),
            'active' => 1,
            'home' => rand(0, 1),
        ];
    }
}
