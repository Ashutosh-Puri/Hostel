<?php

namespace Database\Seeders;

use App\Models\Bed;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Admission;
use Faker\Factory as Faker;
use App\Models\AcademicYear;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Admission::create([
                'academic_year_id' => AcademicYear::inRandomOrder()->first()->id,
                'student_id' => Student::inRandomOrder()->first()->id,
                'class_id' => Classes::inRandomOrder()->first()->id,
                'bed_id' => Bed::inRandomOrder()->first()->id,
                'fee_type_id' => $faker->numberBetween(1, 2),
                'seat_type' => $faker->numberBetween(1, 4),
                'status' => $faker->numberBetween(0,2),
            ]);
        }
    
    }
}