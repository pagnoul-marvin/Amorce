<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fund>
 */
class FundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(rand(1,5)),
            'amount' => $this->faker->numberBetween(500, 10000),
            'pourcentage' => $this->faker->numberBetween(0,10),
            'enclosed' => $this->faker->boolean(),
        ];
    }
}
