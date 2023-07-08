<?php

namespace Database\Factories;

use App\Models\Branch;
use Faker\Provider\Biased;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    private $remunerations;

    public function __construct($count = null,
        ?Collection $states = null,
        ?Collection $has = null,
        ?Collection $for = null,
        ?Collection $afterMaking = null,
        ?Collection $afterCreating = null,
        $connection = null,
        ?Collection $recycle = null)
    {
        parent::__construct($count, $states, $has, $for, $afterMaking, $afterCreating, $connection, $recycle);
        $this->remunerations = [
            ['cycle' => 'PER TASK', 'min' => 5, 'max' => 105],
            ['cycle' => 'HOURLY', 'min' => 200, 'max' => 6250],
            ['cycle' => 'DAILY', 'min' => 1500, 'max' => 50000],
            ['cycle' => 'WEEKLY', 'min' => 7500, 'max' => 250000],
            ['cycle' => 'BI-WEEKLY', 'min' => 15000, 'max' => 500000],
            ['cycle' => 'SEMI-MONTHLY', 'min' => 15000, 'max' => 500000],
            ['cycle' => 'MONTHLY', 'min' => 30000, 'max' => 1000000],
            ['cycle' => 'YEARLY', 'min' => 360000, 'max' => 12000000]
        ];
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        ['cycle' => $cycle, 'min' => $min, 'max' => $max] =
            $this->faker->randomElement($this->remunerations);
        $linearLow = fn($x) => 1 - $x;
        return [
            'branchId' => Branch::inRandomOrder()->first()->branchId,
            'title' => $this->faker->jobTitle(),
            'remuneration' => $this->faker->biasedNumberBetween($min, $max, $linearLow),
            'remunerationCycle' => $cycle,
            'slots' => $this->faker->biasedNumberBetween(1, 1000, $linearLow)
        ];
    }
}
