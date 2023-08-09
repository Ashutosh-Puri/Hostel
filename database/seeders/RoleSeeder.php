<?php

namespace Database\Seeders;

use App\Models\Role;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // Create the superadmin role
        Role::create([
            'role' => 'superadmin',
            'status' => 0,
        ]);

        // Create the admin role
        Role::create([
            'role' => 'admin',
            'status' => 1,
        ]);

        // $faker = Faker::create();
        // for ($i = 0; $i < 20; $i++) {
        //     Role::create([
        //         'role' => $faker->randomElement(['superadmin', 'admin']),
        //         'status' => $faker->numberBetween(0, 1),
        //     ]);
        // }
        
    
    }
}
