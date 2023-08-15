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
        for ($i = 0; $i < 10; $i++) {
            AcademicYear::create([
                'year' => $year--,
                'status' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}