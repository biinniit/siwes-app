<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    private $sampleResumeDir;

    private $resumeFileNames;

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
        $this->sampleResumeDir = base_path() . '/database/factories/sample_resumes';
        $this->resumeFileNames = array_diff(scandir($this->sampleResumeDir), ['..', '.']);
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // either seed a random image or one of the sample resumes
        return ($this->faker->boolean() || empty($this->resumeFileNames)) ? [
            'name' => $this->faker->uuid() . '.png',
            'mimeType' => 'image/png',
            'content' => file_get_contents($this->faker->image(null, 640, 480))
        ] : $this->getResume();
    }

    private function getResume(): array
    {
        $resumeFileName = array_shift($this->resumeFileNames);
        return [
            'name' => $resumeFileName,
            'mimeType' => 'application/pdf',
            'content' => file_get_contents($this->sampleResumeDir . '/' . $resumeFileName)
        ];
    }
}
