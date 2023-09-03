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
        $card = '/events/img-' . rand(1, 20) . '.jpg';
        $title = $this->faker->sentence(4);

        return [
            'slug' => Str::slug($title),
            'title' => ucfirst($title),
            'duration' => rand(1, 3) . ' hrs ' . rand(1, 59) . ' mins',
            'entry' => $this->faker->text(250),
            'description' => $this->faker->text(500),
            'type' => 'public',
            'card' => '/storage/img/events/img-' . rand(1, 20) . '.jpg',
            'thum' => '/storage/img/events/img-' . rand(1, 20) . '.jpg',
            'banner' => '/storage/img/events/banners/carousel-' . rand(1, 9) . '.jpg',
            // 'ceo_title' => $this->faker->words(3, true),
            // 'ceo_desc' => $this->faker->sentence(),
            // 'social_fa' => $this->faker->domainName(),
            // 'social_tw' => $this->faker->domainName(),
            // 'social_yt' => $this->faker->domainName(),
            'active' => 1,
        ];
    }
}
