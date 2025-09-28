<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cover_image' => fake()->imageUrl(200, 200, 'people', true, 'Artist Image'),
            // 'cover_image' => fake()->image(null, '200', '200', 'people', false, true),
            'name' => fake()->name(),
            'bio' => fake()->paragraph(5),
        ];
    }
}
