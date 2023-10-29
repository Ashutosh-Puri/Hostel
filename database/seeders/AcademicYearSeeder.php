<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\AcademicYear;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $year=2023;
        $status=0;
        for ($i = 0; $i < 5; $i++) {
            AcademicYear::create([
                'year' => $year--,
                'status' => $status,
            ]);
            $status=1;
        }
    }
}
