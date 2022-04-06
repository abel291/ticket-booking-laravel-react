<?php

namespace Database\Factories;

use App\Enums\EventTypes;
use App\Enums\TicketTypes;
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
        $img = rand(1, 20);
        $name=$this->faker->sentence(4);
        return [
            'name' => $name,
            'slug' => Str::slug($name),            
            'duration' => rand(1, 3) . ' hrs ' . rand(1, 59) . ' mins',
            'type' => $this->faker->randomElement([
                EventTypes::EVENT->value,
                EventTypes::SPORT->value,
                EventTypes::MOVIE->value,
            ]),

            'des_min' => $this->faker->text(150),
            'des_max' => $this->faker->text(500),
            'tomatoes' => rand(50, 100),
            'audience' => rand(50, 100),
            'calificación' => rand(70, 100),
            'img_banner' => "/event/banner/img-" . $img . ".jpg",
            'img_card' => "/event/card/img-" . $img . ".jpg",
            'img_thum' => "/event/thumb/img-" . $img . ".jpg",
            'ceo_title' => $this->faker->words(3, true),
            'ceo_desc' => $this->faker->sentence(),
            'social_fa' => $this->faker->domainName(),
            'social_tw' => $this->faker->domainName(),
            'social_yt' => $this->faker->domainName(),
        ];
    }
}
