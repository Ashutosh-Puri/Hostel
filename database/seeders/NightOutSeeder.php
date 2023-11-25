<?php

namespace Database\Seeders;

use App\Models\NightOut;
use App\Models\Allocation;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NightOutSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            NightOut::create([
                'status' => $faker->numberBetween(0, 1),
                'going_date' => now(),
                'comming_date' => now(),
                'reason' => $faker->title,
                'allocation_id' => Allocation::inRandomOrder()->first()->id,
            ]);
        }
    }
}
