<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitors>
 */
class VisitorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'user_id' => User::inRandomOrder()->first()->id,
            'nik' => fake()->numberBetween(700000, 3500000),
            'telepon' => fake()->numberBetween(700000, 3500000),
            'kelahiran' => fake()->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d')
        ];
    }
}
