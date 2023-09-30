<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Floor;
use App\Models\Seated;
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
        for ($i = 0; $i < 100; $i++) {
            Room::create([
                'label' => $faker->name,
                'capacity' => $faker->numberBetween(1, 50),
                'seated_id' => Seated::inRandomOrder()->first()->id,
                'floor_id' => Floor::inRandomOrder()->first()->id,
            ]);
        }
    }
}
