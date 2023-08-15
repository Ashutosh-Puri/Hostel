<?php

namespace Database\Seeders;

use App\Models\Quota;
use App\Models\Classes;
use Faker\Factory as Faker;
use App\Models\AcademicYear;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Quota::create([
                'status' => $faker->numberBetween(0, 1),
                'max_capacity' => $faker->numberBetween(10,25),
                'academic_year_id' => AcademicYear::inRandomOrder()->first()->id,
                'class_id' => Classes::inRandomOrder()->first()->id,
            ]);
        }
    }
}
