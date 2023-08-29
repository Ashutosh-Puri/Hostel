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
        // $faker = Faker::create();

        // for ($i = 0; $i < 10; $i++) {
        //     Building::create([
        //         'name' => $faker->unique()->name,
        //         'status' => $faker->numberBetween(0, 1),
        //         'hostel_id' => Hostel::inRandomOrder()->first()->id,
        //     ]);
        // }

        $records = [
            [   
                'id'=>1,
                'name' => "B-Building 1",
                'status' => 0,
                'hostel_id' => 1,
            ],
            [
                'id'=>2,
                'name' => "B-Building 2",
                'status' => 0,
                'hostel_id' => 1,
            ],
            [
                'id'=>3,
                'name' => "G-Building 1",
                'status' => 0,
                'hostel_id' => 2,
            ],
            [   
                'id'=>4,
                'name' => "G-Building 2",
                'status' => 0,
                'hostel_id' => 2,
            ],
        ];

        foreach ($records as $record) {
            Building::create($record);
        }
    }
}
