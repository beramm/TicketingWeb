<?php

namespace Database\Factories;

use App\Models\Tickets;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bought>
 */
class BoughtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'users_id' => User::inRandomOrder()->first()->id,
            'tickets_id' => Tickets::inRandomOrder()->first()->id,
            'jumlah' => fake()->numberBetween(1,10),
        ];
    }
}
