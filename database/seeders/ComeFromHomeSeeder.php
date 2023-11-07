<?php

namespace Database\Seeders;

use App\Models\Allocation;
use Faker\Factory as Faker;
use App\Models\ComeFromHome;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComeFromHomeSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            ComeFromHome::create([
                'status' => $faker->numberBetween(0, 1),
                'come_time' => now(),
                'allocation_id' => Allocation::inRandomOrder()->first()->id,
            ]);
        }
    }
}
