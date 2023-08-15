<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Admission;
use App\Models\AcademicYear;
use Illuminate\Database\Seeder;
use App\Models\StudentEducation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class StudentEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            StudentEducation::create([
                'admission_id' => Admission::inRandomOrder()->first()->id,
                'academic_year_id' => AcademicYear::inRandomOrder()->first()->id,
                'student_id' => Student::inRandomOrder()->first()->id,
                'last_class_id' => Classes::inRandomOrder()->first()->id,
                'sgpa' => $faker->numberBetween(0.00,10.00),
                'percentage' => $faker->numberBetween(0,100),
            ]);
        }
    }
}
