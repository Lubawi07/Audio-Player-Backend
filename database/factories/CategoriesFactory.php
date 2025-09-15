<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories>
 */
class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Pop',
                'Rock',
                'Hip Hop',
                'Jazz',
                'Blues',
                'Classical',
                'Reggae',
                'Metal',
                'K-Pop',
                'Soundtrack'
            ])
        ];
    }
}
