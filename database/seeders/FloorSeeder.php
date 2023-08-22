<?php

namespace Database\Seeders;

use App\Models\Floor;
use App\Models\Building;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();
        // for ($i = 0; $i < 4; $i++) {
        //     Floor::create([
        //         'floor' => $i,
        //         'status' => 0,
        //         'building_id' => Building::inRandomOrder()->first()->id,
        //     ]);
        // }

        $records = [
            [   
                'id'=>1,
                'floor' =>0,
                'status' => 0,
                'building_id' => 1,
            ],
            [   
                'id'=>2,
                'floor' =>1,
                'status' => 0,
                'building_id' => 1,
            ],
            [   
                'id'=>3,
                'floor' =>2,
                'status' => 1,
                'building_id' => 1,
            ],
            [   
                'id'=>4,
                'floor' =>0,
                'status' => 0,
                'building_id' => 2,
            ],
            [   
                'id'=>5,
                'floor' =>1,
                'status' => 0,
                'building_id' => 2,
            ],
            [   
                'id'=>6,
                'floor' =>2,
                'status' => 1,
                'building_id' => 2,
            ],[   
                'id'=>7,
                'floor' =>0,
                'status' => 0,
                'building_id' => 3,
            ],
            [   
                'id'=>8,
                'floor' =>1,
                'status' => 0,
                'building_id' => 3,
            ],
            [   
                'id'=>9,
                'floor' =>2,
                'status' => 1,
                'building_id' => 3,
            ],[   
                'id'=>10,
                'floor' =>0,
                'status' => 0,
                'building_id' => 4,
            ],
            [   
                'id'=>11,
                'floor' =>1,
                'status' => 0,
                'building_id' => 4,
            ],
            [   
                'id'=>12,
                'floor' =>2,
                'status' => 1,
                'building_id' => 4,
            ],

        ];

        foreach ($records as $record) {
            Floor::create($record);
        }
    }
}
