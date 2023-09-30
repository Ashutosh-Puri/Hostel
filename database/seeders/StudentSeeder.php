<?php

namespace Database\Seeders;

use App\Models\Cast;
use App\Models\Student;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'username' => 'Ashutosh',
            'email' => 'ashutoshpuri2000@gmail.com',
            'password' => Hash::make('123456789'),
            'status' => '0',
            'email_verified_at' => now(),
        ]);

         Student::create([
            'username' => 'Tejas',
            'email' => 'tejas123@gmail.com',
            'password' => Hash::make('123456789'),
            'status' => '0',
            'email_verified_at' => now(),
        ]);

        $faker = Faker::create();
        $mobileNumberFormat = '##########';
        for ($i = 0; $i < 100; $i++) {
            Student::create([
                'username' => Str::slug($faker->unique()->userName, '_'),
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'mobile' => $faker->unique()->numerify($mobileNumberFormat),
                'photo' => $faker->imageUrl(),
                'member_id' => $faker->unique()->numberBetween(100000, 999999),
                'prn' => $faker->unique()->numberBetween(100000000000, 999999999999),
                'abc_id' => $faker->unique()->numberBetween(10000, 99999),
                'eligibility_no' => $faker->unique()->numberBetween(100000000000, 999999999999),
                'mobile_verified_at' => $faker->dateTime,
                'email_verified_at' => $faker->dateTime,
                'last_login' => $faker->dateTime,
                'password' =>  $faker->password,
                'status' => $faker->numberBetween(0, 1),
                'mother_name' => $faker->name,
                'dob' =>  $faker->dateTimeBetween('-65 years', '-18 years')->format('Y-m-d'),
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
                'gender' => $faker->numberBetween(0, 1),
                'cast_id' =>  Cast::inRandomOrder()->first()->id,
            ]);
        }
    }
}
