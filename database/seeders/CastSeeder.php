<?php

namespace Database\Seeders;

use App\Models\Cast;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
        
            // Add more user data as needed
        ];
        Cast::insert($usersData);
    }
}
