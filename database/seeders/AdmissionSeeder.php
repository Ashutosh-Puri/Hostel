<?php

namespace Database\Seeders;

use App\Models\Bed;
use App\Models\Seated;
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

        for ($i = 0; $i < 100; $i++) {
            Admission::create([
                'academic_year_id' => AcademicYear::inRandomOrder()->first()->id,
                'student_id' => Student::inRandomOrder()->first()->id,
                'class_id' => Classes::inRandomOrder()->first()->id,
                'seated_id' => Seated::inRandomOrder()->first()->id,
                'status' => $faker->numberBetween(0,2),
            ]);
        }
    
    }
}
