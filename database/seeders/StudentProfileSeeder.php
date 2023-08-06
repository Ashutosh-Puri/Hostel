<?php

namespace Database\Seeders;

use App\Models\Student;
use Faker\Factory as Faker;
use App\Models\StudentProfile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $mobileNumberFormat = '##########';
        for ($i = 0; $i < 100; $i++) {
            StudentProfile::create([
                'mother_name' => $faker->name,
                'dob' =>  $faker->dateTimeBetween('-65 years', '-18 years')->format('Y-m-d'),
                'cast' => $faker->name,
                'category' => $faker->name,
                'parent_name' => $faker->name,
                'parent_address' => $faker->jobTitle,
                'parent_mobile' =>$faker->unique()->numerify($mobileNumberFormat),
                'local_parent_name' => $faker->name,
                'local_parent_address' => $faker->jobTitle,
                'local_parent_mobile' => $faker->unique()->numerify($mobileNumberFormat),
                'address_type' => $faker->numberBetween(0, 1),
                'blood_group' => $faker->randomElement(['A-', 'A+','AB-', 'AB+','O-', 'O+','B-', 'B+']),
                'is_allergy' => $faker->name,
                'is_ragging' => $faker->numberBetween(0, 1),
                'student_id' => Student::inRandomOrder()->first()->id,
            ]);
        }
    }
}
