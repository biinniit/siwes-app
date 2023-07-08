<?php

namespace Database\Seeders;

require_once('DatabaseSeeder.php');

use App\Models\Application;
use App\Models\Role;
use App\Models\RoleTag;
use App\Models\Student;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(range(1, 10) as $i) {
            $tagIds = Tag::inRandomOrder()
                ->take(ROLE_TAGS_PER_ROLE)
                ->pluck('tagId')
                ->all();
            $studentIds = Student::inRandomOrder()
                ->take(APPLICATIONS_PER_ROLE)
                ->pluck('studentId')
                ->all();

            Role::factory()
                ->has(RoleTag::factory()
                    ->count(ROLE_TAGS_PER_ROLE)
                    ->sequence(fn($sequence) =>
                        ['tagId' => $tagIds[$sequence->index]]))
                ->has(Application::factory()
                    ->count(APPLICATIONS_PER_ROLE)
                    ->sequence(fn($sequence) =>
                        ['studentId' => $studentIds[$sequence->index]]))
                ->create();
        }
    }
}
