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
    public function run()
    {
        $faker = Faker::create();
        $startDate = Carbon::create(2010, 1, 1);
        $endDate = Carbon::now()->endOfYear();

        while ($startDate->lte($endDate)) {
            Attendance::create([
                'rfid' => $faker->numberBetween(0, 99999999), // Corrected the range
                'entry_time' => $startDate,
                'exit_time' => $startDate,
                'student_id' => Student::inRandomOrder()->first()->id,
                'created_at' => $startDate,
            ]);

            $startDate->addDay(); // Move to the next day
        }
    }
}
