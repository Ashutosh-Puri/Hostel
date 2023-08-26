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
            'email' => 'cmdsofts@gmail.com',
            'password' => Hash::make('123456789'),
            'mobile'=>'9373545745',
            'status' => '0',
        ]);

        $user1->assignRole('Super Admin');
    

        $user2= Admin::create([
            'name' => 'Teja Pawar',
            'email' => 'rsofts74@gmail.com',
            'password' => Hash::make('123456789'),
            'mobile'=>'8888448451',
            'status' => '0',
        ]);
        $user2->assignRole('Admin');

    }
}
