<?php

namespace Database\Seeders;

use App\Models\Fine;
use Faker\Factory as Faker;
use App\Models\AcademicYear;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 1000 fake records into the Classes table
        for ($i = 0; $i < 10; $i++) {
            Fine::create([
                'name' => $faker->name,
                'status' => $faker->numberBetween(0, 1),
                'amount' => $faker->numberBetween(100,1000),
                'academic_year_id' => AcademicYear::inRandomOrder()->first()->id,
            ]);
        }
    }
}
