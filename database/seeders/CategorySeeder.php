<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryData = [
            [
                'id' => '1',
                'name' => 'ST',
            ],
            [
                'id' => '2',
                'name' => 'OBC',
            ],
            [
                'id' => '3',
                'name' => 'SBC',
            ],
            [
                'id' => '4',
                'name' => 'SC',
            ],
            [
                'id' => '5',
                'name' => 'VJ-A',
            ],
            [
                'id' => '6',
                'name' => 'NT-B',
            ],
            [
                'id' => '7',
                'name' => 'NT-C',
            ],
            [
                'id' => '8',
                'name' => 'NT-D',
            ],
            [
                'id' => '9',
                'name' => 'GENERAL',
            ],
            // Add more user data as needed
        ];
        Category::insert($categoryData);
    }
}
