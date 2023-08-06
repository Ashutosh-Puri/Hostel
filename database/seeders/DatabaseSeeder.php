<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Building;
use Database\Seeders\BedSeeder;
use Database\Seeders\FeeSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\FineSeeder;
use Database\Seeders\RoomSeeder;
use Database\Seeders\QuotaSeeder;
use Database\Seeders\ClassesSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\BuildingSeeder;
use Database\Seeders\FacilitySeeder;
use Database\Seeders\StudentFineSeeder;
use Database\Seeders\AcademicYearSeeder;
use Database\Seeders\StudentPaymentSeeder;
use Database\Seeders\StudentProfileSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $this->call(AcademicYearSeeder::class);
        $this->call(ClassesSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(BuildingSeeder::class);
        $this->call(FineSeeder::class);             //  Acadmic Year ,
        $this->call(FeeSeeder::class);              //  Acadmic Year ,
        $this->call(QuotaSeeder::class);            //  Acadmic Year , Class ,
        $this->call(StudentProfileSeeder::class);   //  Student ,
        $this->call(RoomSeeder::class);             //  Building ,
        $this->call(BedSeeder::class);              //  Room ,
        $this->call(FacilitySeeder::class);         //  Room ,
        $this->call(StudentFineSeeder::class);      //  Acadmic Year , Student , Fine ,

        // $this->call(AdmissionSeeder::class);        //   Acadmic Year , Student , class ,Room ,
        // $this->call(StudentPaymentSeeder::class);   //   Acadmic Year , Student , Admission ,
          
    }
}
