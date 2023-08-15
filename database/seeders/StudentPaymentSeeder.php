<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Admission;
use Faker\Factory as Faker;
use App\Models\AcademicYear;
use App\Models\StudentPayment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 1000 fake records into the Classes table
        for ($i = 0; $i < 10; $i++) {
            StudentPayment::create([
                'status' => $faker->numberBetween(0, 1),
                'total_amount' => $faker->numberBetween(100,1000),
                'academic_year_id' => AcademicYear::inRandomOrder()->first()->id,
                'student_id' => Student::inRandomOrder()->first()->id,
                'admission_id' => Admission::inRandomOrder()->first()->id,
            ]);
        }
    }
}