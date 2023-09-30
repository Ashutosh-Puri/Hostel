<?php

namespace Database\Seeders;

use App\Models\Bed;
use App\Models\Room;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 1000 fake records into the Classes table
        for ($i = 0; $i < 200; $i++) {
            Bed::create([
                'status' => $faker->numberBetween(0, 1),
                'room_id' => Room::inRandomOrder()->first()->id,
            ]);
        }
    }
}
