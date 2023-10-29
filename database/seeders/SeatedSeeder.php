<?php

namespace Database\Seeders;

use App\Models\Seated;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeatedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            [   
                'id'=>1,
                'seated' => 1,
                'status' => 0,
            ],
            [
                'id'=>2,
                'seated' => 2,
                'status' => 0,
            ],
            [
                'id'=>3,
                'seated' => 3,
                'status' => 0,
            ],
        ];

        foreach ($records as $record) {
            Seated::create($record);
        }
    }
}
