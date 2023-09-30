<?php

namespace Database\Seeders;

use App\Models\Fee;
use App\Models\Seated;
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

 
        for ($i = 0; $i < 10; $i++) {
            Fee::create([
                'status' => $faker->numberBetween(0, 1),
                'seated_id' => Seated::inRandomOrder()->first()->id,
                'amount' => $faker->numberBetween(500, 14000),
                'academic_year_id' => AcademicYear::inRandomOrder()->first()->id,
            ]);
        }
    }
}
