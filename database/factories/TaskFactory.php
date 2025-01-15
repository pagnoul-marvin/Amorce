<?php

namespace Database\Factories;

use App\Enum\TaskCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(rand(1, 5)),
            'description' => $this->faker->paragraph(rand(1, 5)),
            'category' => TaskCategories::cases()[array_rand(TaskCategories::cases())]->value,
            'date' => $this->faker->dateTimeBetween('-2 days', '+2 days'),
        ];
    }
}
