<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class ClassesSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Classes::create([
                'name' => $faker->name,
                'stream' => $faker->randomElement(['Science', 'Arts', 'Commerce']),
                'type' => $faker->randomElement(['Junior', 'Undergraduate', 'Postgraduate', 'Senior']),
                'status' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}
