<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'companyId' => Company::inRandomOrder()->first()->companyId,
            'name' => $this->faker->city(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->numberBetween(6999999999, 10000000000)
        ];
    }
}
