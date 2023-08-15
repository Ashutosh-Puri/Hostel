<?php

namespace Database\Seeders;

use App\Models\Fee;
use App\Models\Admission;
use App\Models\Allocation;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AllocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Allocation::create([
                'admission_id' => Admission::inRandomOrder()->first()->id,
                'fee_id' => Fee::inRandomOrder()->first()->id,
            ]);
        }
    }
}