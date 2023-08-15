<?php

namespace Database\Seeders;

use App\Models\Fine;
use App\Models\Student;
use App\Models\StudentFine;
use Faker\Factory as Faker;
use App\Models\AcademicYear;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentFineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            StudentFine::create([
                'status' => $faker->numberBetween(0, 1),
                'amount' => $faker->numberBetween(100,1000),
                'academic_year_id' => AcademicYear::inRandomOrder()->first()->id,
                'student_id' => Student::inRandomOrder()->first()->id,
                'fine_id' => Fine::inRandomOrder()->first()->id,
            ]);
        }
    }
}
