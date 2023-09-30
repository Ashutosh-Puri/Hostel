<?php

namespace Database\Seeders;

use App\Models\Bed;
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

        for ($i = 0; $i < 200; $i++) {
            Allocation::create([
                'admission_id' => Admission::inRandomOrder()->first()->id,
                'bed_id' => Bed::inRandomOrder()->first()->id,
            ]);
        }
    }
}
