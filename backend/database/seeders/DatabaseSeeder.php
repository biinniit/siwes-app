<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Branch;
use App\Models\Company;
use App\Models\File;
use App\Models\Program;
use App\Models\Role;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // This is the recommended seed order, because of the relationships
        File::factory(10)->create();
        Company::factory(3)->create();
        Branch::factory(5)->create();
        Role::factory(10)->hasRoleTag(3)->create();
        Tag::factory(15)->create();
        Program::factory(10)->create();
    }
}
