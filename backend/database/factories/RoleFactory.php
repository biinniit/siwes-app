<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'branchId' => Branch::inRandomOrder()->first()->branchId,
            'title' => $this->faker->jobTitle(),
            'remuneration' => $this->faker->randomFloat(2, 500, 12000000),
            'remunerationCycle' => $this->faker->randomElement([
                'PER TASK', 'HOURLY', 'DAILY', 'WEEKLY',
                'BI-WEEKLY', 'SEMI-MONTHLY', 'MONTHLY', 'YEARLY'
            ]),
            'slots' => $this->faker->numberBetween(1, 32767)
        ];
    }
}
