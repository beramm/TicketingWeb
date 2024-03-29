<?php

namespace Database\Factories;

use App\Models\Concerts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tickets>
 */
class TicketsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $venue = ['cat1', 'cat2', 'cat3', 'cat4'];
        return [
            'concerts_id' => Concerts::inRandomOrder()->first()->id,
            'venue' => fake()->randomElement($venue),
            'harga' => fake()->numberBetween(700000, 3500000),
            'kuantitas' => fake()->numberBetween(1, 50)
        ];
    }
}
