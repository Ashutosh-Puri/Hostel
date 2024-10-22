<?php

namespace Database\Seeders;

use App\Models\Admin;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1= Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'mobile'=>'9373545745',
            'status' => '0',
        ]);

        $user1->assignRole('Super Admin');


        $user2= Admin::create([
            'name' => 'Admin',
            'email' => 'servercmd2000@gmail.com',
            'password' => Hash::make('123456789'),
            'mobile'=>'9890931325',
            'status' => '0',
        ]);
        $user2->assignRole('Admin');

    }
}
