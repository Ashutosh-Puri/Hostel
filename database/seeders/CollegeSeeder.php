<?php

namespace Database\Seeders;

use App\Models\College;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $faker = Faker::create();

        // // Insert 1000 fake records into the Classes table
        // for ($i = 0; $i < 10; $i++) {
        //     College::create([
        //         'name' => $faker->unique()->name,
        //         'status' => $faker->numberBetween(0, 1),
        //     ]);
        // }

        $records = [
            [   
                'id'=>1,
                'heading_1'=>"Shikshan Prasark Sanstha's",
                'heading_1_mr'=>"शिक्षण प्रसारक संस्थाचे",
                'name' => "Sangamner Nagarpalika Arts, D. J. Malpani Commerce and B. N. Sarda Science College ( Autonomous ) Sangamner",
                'name_mr'=>"संगमनेर नगरपालिका कला , दा.ज. मालपाणी वाणिज्य आणि ब.ना. सारडा विज्ञान महाविद्यालय ( स्वायत्त ) संगमनेर",
                'email'=>'info@sangamnercollege.edu.in',
                'mobile'=>' 02425-225893',
                'address'=>'Sangamner 422605, Ahmednagar, MH, IN',
                'status' => 0,
            ],
        ];

        foreach ($records as $record) {
            College::create($record);
        }
    }
}
