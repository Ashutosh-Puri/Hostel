<?php

namespace Database\Seeders;

use App\Models\Hostel;
use App\Models\College;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class HostelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // // Insert 1000 fake records into the Classes table
        // for ($i = 0; $i < 10; $i++) {
        //     Hostel::create([
        //         'name' => $faker->unique()->name,
        //         'status' => $faker->numberBetween(0, 1),
        //         'college_id' => College::inRandomOrder()->first()->id,
        //     ]);
        // }

        $records = [
            [   
                'id'=>1,
                'name' => "Boys Hostel",
                'gender' => 0,
                'status' => 0,
                'college_id' => 1,
            ],
            [
                'id'=>2,
                'name' => "Girls Hostel",
                'gender' => 1,
                'status' => 0,
                'college_id' => 1,
            ],
        ];

        foreach ($records as $record) {
            Hostel::create($record);
        }
    }
}
