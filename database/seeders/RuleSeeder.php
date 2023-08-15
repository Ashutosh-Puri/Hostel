<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define your sample rules
        $rules = [
            [
                'name' => 'Quiet Hours',
                'description' => 'Quiet hours are from 10:00 PM to 7:00 AM. Please keep noise levels down during these times.',
            ],
            [
                'name' => 'Guest Policy',
                'description' => 'Guests are allowed to visit between 9:00 AM and 9:00 PM. They must sign in at the reception.',
            ],

        ];

        Rule::insert($rules);
    }
    }
