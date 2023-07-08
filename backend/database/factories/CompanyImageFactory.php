<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyImage>
 */
class CompanyImageFactory extends Factory
{
    private $imageIds;

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
        $this->imageIds = File::where('mimeType', 'LIKE', 'image/%')->pluck('fileId')->all();
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imageId' => $this->faker->unique()->randomElement($this->imageIds),
            'companyId' => Company::inRandomOrder()->first()->companyId
        ];
    }
}
