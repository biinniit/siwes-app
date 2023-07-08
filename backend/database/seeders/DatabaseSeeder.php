<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Application;
use App\Models\Branch;
use App\Models\Company;
use App\Models\File;
use App\Models\Program;
use App\Models\Role;
use App\Models\RoleTag;
use App\Models\Student;
use App\Models\Tag;
use Illuminate\Database\Seeder;

const ROLE_TAGS_PER_ROLE = 3;
const APPLICATIONS_PER_ROLE = 4;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // This is the recommended seed order, because of the relationships
        File::factory(20)->create();
        Company::factory(3)->create();
        Branch::factory(5)->create();
        Tag::factory(15)->create();
        Program::factory(10)->create();
        Student::factory(30)->create();

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
