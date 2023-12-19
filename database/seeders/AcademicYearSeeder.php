<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Models\AcademicYear;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   

        $year= Carbon::now()->year;
        $status=0;
        for ($i = 0; $i < 5; $i++) {
            AcademicYear::create([
                'year' => $year--,
                'status' => $status,
            ]);
            $status=1;
        }
    }
}
