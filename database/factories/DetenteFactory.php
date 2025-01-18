<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detente>
 */
class DetenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startingAt = $this->faker->dateTimeBetween('-1 year');
        return [
            'starting_at' => $startingAt->format('Y-m-d'),
            'ending_at' => $startingAt->modify('+3 months')->format('Y-m-d'),
        ];
    }

    public static function generateConsecutivePeriods($startDate, $count): array
    {
        $dates = [];
        $currentStart = new \DateTime($startDate);

        for ($i = 0; $i < $count; $i++) {
            $currentEnd = (clone $currentStart)->modify('+3 months');
            $dates[] = [
                'starting_at' => $currentStart->format('Y-m-d'),
                'ending_at' => $currentEnd->format('Y-m-d'),
            ];
            $currentStart = $currentEnd;
        }
        return $dates;
    }
}
