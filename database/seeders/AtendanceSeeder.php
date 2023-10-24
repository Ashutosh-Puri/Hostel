<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Attendance;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class AtendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 1000 fake records into the Classes table

        // for ($i = 0; $i <3000; $i++) {
        //     Attendance::create([
        //         'rfid' => $faker->numberBetween(0000000, 99999999),
        //         'entry_time' => now(),
        //         'student_id' => Student::inRandomOrder()->first()->id,
        //     ]);
        // }

        $startDate = Carbon::now()->startOfYear();
$endDate = Carbon::now()->endOfYear();
for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
    Attendance::create([
        'rfid' => $faker->numberBetween(0000000, 99999999),
        'entry_time' => $date,
        'student_id' => Student::inRandomOrder()->first()->id,
        'created_at'=>$date
    ]);
}
    }
}
