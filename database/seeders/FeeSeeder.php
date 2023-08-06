<?php

namespace Database\Seeders;

use App\Models\Fee;
use Faker\Factory as Faker;
use App\Models\AcademicYear;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 1000 fake records into the Classes table
        for ($i = 0; $i < 100; $i++) {
            Fee::create([
                'status' => $faker->numberBetween(0, 1),
                'type' => $faker->numberBetween(1, 4),
                'academic_year_id' => AcademicYear::inRandomOrder()->first()->id,
            ]);
        }
    }
}
