<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'note' => $this->faker->paragraph(rand(1, 5)),
            'amount' => $this->faker->numberBetween(100, 5000),
            'date' => $this->faker->dateTimeBetween('-20 days', now()),
            'hash' => $this->faker->md5(),
        ];
    }
}
