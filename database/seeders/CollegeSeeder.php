<?php

namespace Database\Seeders;

use App\Models\College;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 1000 fake records into the Classes table
        for ($i = 0; $i < 10; $i++) {
            College::create([
                'name' => $faker->unique()->name,
                'status' => $faker->numberBetween(0, 1),
            ]);
        }
    }
}
