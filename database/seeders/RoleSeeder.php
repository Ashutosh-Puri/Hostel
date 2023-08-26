<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $records = [
            [   
                'name' => "Super Admin",
                'guard_name' => 'admin',
                'status' => 0,
            ],
            [   
                'name' => "Admin",
                'guard_name' => 'admin',
                'status' => 0,
            ],[   
                'name' => "Manager",
                'guard_name' => 'admin',
                'status' => 1,
            ]
            ,[   
                'name' => "Accountant",
                'guard_name' => 'admin',
                'status' => 1,
            ],
            
        ];

        foreach ($records as $record) {
            Role::create($record);
        }
    }
}
