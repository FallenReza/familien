<?php

namespace Database\Factories;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MaintenanceReport>
 */
class MaintenanceReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $priorities = ['low', 'medium', 'high', 'urgent'];
        $statuses = ['open', 'in_progress', 'completed', 'closed'];

        $reportedAt = $this->faker->dateTimeBetween('-1 year', 'now');
        $completedAt = $this->faker->boolean(70) ? $this->faker->dateTimeBetween($reportedAt, 'now') : null;

        return [
            'unit_id' => Unit::inRandomOrder()->first()->id ?? 1,
            'reported_by_id' => User::inRandomOrder()->first()->id ?? 1,
            'assigned_to_id' => $this->faker->boolean(80) ? User::inRandomOrder()->first()->id ?? 1 : null,
            'title' => $this->faker->sentence(6, true),
            'description' => $this->faker->paragraphs(3, true),
            'priority' => $this->faker->randomElement($priorities),
            'status' => $this->faker->randomElement($statuses),
            'reported_at' => $reportedAt,
            'completed_at' => $completedAt,
            'documentation_images' => $this->faker->boolean(50) ? json_encode([$this->faker->imageUrl(), $this->faker->imageUrl()]) : null,
        ];
    }
}
