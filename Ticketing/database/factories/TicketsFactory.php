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
            'idKonser' => Concerts::inRandomOrder()->first()->idKonser,
            'venue' => fake()->randomElement($venue)
        ];
    }
}
