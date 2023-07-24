<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyUser>
 */
class CompanyUserFactory extends Factory
{
    private $localizedFaker;

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
        $this->localizedFaker = FakerFactory::create('en_NG');
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakeNames = explode(' ', $this->localizedFaker->name());
        $fakeEmail = $this->faker->unique()->safeEmail();
        return [
            'firstName' => $fakeNames[0],
            'lastName' => $fakeNames[1],
            'email' => $fakeEmail,
            'passwordHash' => hex2bin(hash('sha256', $fakeEmail))
        ];
    }
}
