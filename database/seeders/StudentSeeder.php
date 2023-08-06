<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        Student::create([
            'name' => 'Ashutosh',
            'email' => 'ashutoshpuri2000@gmail.com',
            'password' => Hash::make('123456789'),
            'status' => '0',
        ]);

        $faker = Faker::create();
        $mobileNumberFormat = '##########';
        for ($i = 0; $i < 100; $i++) {
            Student::create([
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
            ]);
        }
    }  
}
