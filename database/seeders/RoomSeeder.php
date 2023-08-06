<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Building;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 1000 fake records into the Classes table
        for ($i = 0; $i < 100; $i++) {
            Room::create([
                'label' => $faker->name,
                'floor' => $faker->numberBetween(0, 10),
                'type' => $faker->numberBetween(0, 10),
                'capacity' => $faker->numberBetween(1, 50),
                'building_id' => Building::inRandomOrder()->first()->id,
            ]);
        }
    }
}
