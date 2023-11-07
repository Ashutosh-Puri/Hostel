<?php

namespace Database\Seeders;

use App\Models\Allocation;
use Faker\Factory as Faker;
use App\Models\LocalRegister;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocalRegisterSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            LocalRegister::create([
                'status' => $faker->numberBetween(0, 1),
                'entry_time' => now(),
                'exit_time' => now(),
                'reason' => $faker->title,
                'allocation_id' => Allocation::inRandomOrder()->first()->id,
            ]);
        }
    }
}
