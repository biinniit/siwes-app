<?php

namespace Database\Seeders;

use App\Models\CompanyImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // must be <= number of files - number of resumes
        CompanyImage::factory()->times(15)->create();
    }
}
