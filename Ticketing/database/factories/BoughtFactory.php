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
            'idUser' => User::inRandomOrder()->first()->idUser,
            'idTiket' => Tickets::inRandomOrder()->first()->idTiket,
            'jumlah' => fake()->numberBetween(1,10),
        ];
    }
}
