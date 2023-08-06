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

        // Insert 1000 fake records into the Classes table
        for ($i = 0; $i < 100; $i++) {
            AcademicYear::create([
                'year' => $faker->numberBetween(2020,2024),
                'status' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}
