<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $towers = ['A', 'B', 'C', 'D'];
        $statuses = ['available', 'occupied', 'maintenance'];

        return [
            'unit_number' => $this->faker->unique()->bothify('Unit-###'),
            'floor' => $this->faker->numberBetween(1, 20),
            'tower' => $this->faker->randomElement($towers),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}
