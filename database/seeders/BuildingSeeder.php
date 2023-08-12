<?php

namespace Database\Seeders;

use App\Models\Hostel;
use App\Models\Building;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            Building::create([
                'name' => $faker->unique()->name,
                'status' => $faker->numberBetween(0, 1),
                'hostel_id' => Hostel::inRandomOrder()->first()->id,
            ]);
        }
    }
}
