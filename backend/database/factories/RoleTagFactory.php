<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoleTag>
 */
class RoleTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tagId' => $this->faker
                ->unique($reset = true)
                ->randomElement(Tag::inRandomOrder()->pluck('tagId'))
        ];
    }
}
