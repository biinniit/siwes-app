<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\CompanyUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory()
            ->times(3)
            ->has(CompanyUser::factory()->count(1), 'companyUser')
            ->create();
    }
}
