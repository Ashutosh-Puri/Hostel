<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Building;
use Database\Seeders\BedSeeder;
use Database\Seeders\FeeSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\CastSeeder;
use Database\Seeders\FineSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RoomSeeder;
use Database\Seeders\RuleSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\QuotaSeeder;
use Database\Seeders\HostelSeeder;
use Database\Seeders\ClassesSeeder;
use Database\Seeders\CollegeSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\BuildingSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\FacilitySeeder;
use Database\Seeders\AdmissionSeeder;
use Database\Seeders\AllocationSeeder;
use Database\Seeders\StudentFineSeeder;
use Database\Seeders\AcademicYearSeeder;
use Database\Seeders\StudentPaymentSeeder;
use Database\Seeders\StudentProfileSeeder;
use Database\Seeders\StudentEducationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);            //  Role ,
        // $this->call(AcademicYearSeeder::class);
        // $this->call(ClassesSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CastSeeder::class);          //  Category ,
        $this->call(StudentSeeder::class);          //  Cast ,
        // $this->call(CollegeSeeder::class);
        // $this->call(HostelSeeder::class);           //  College ,
        // $this->call(BuildingSeeder::class);         //  Hostel ,
        // $this->call(FineSeeder::class);             //  Acadmic Year ,
        // $this->call(FeeSeeder::class);              //  Acadmic Year ,
        // $this->call(QuotaSeeder::class);            //  Acadmic Year , Class ,
        // $this->call(RoomSeeder::class);             //  Building ,
        // $this->call(BedSeeder::class);              //  Room ,
        // $this->call(FacilitySeeder::class);         //  Room ,
        // $this->call(StudentFineSeeder::class);      //  Acadmic Year , Student , Fine ,
        // $this->call(AdmissionSeeder::class);        //   Acadmic Year , Student , class ,Bed,
        // $this->call(StudentEducationSeeder::class); //   Acadmic Year , Student , class ,Admission ,
        // $this->call(StudentPaymentSeeder::class);   //   Acadmic Year , Student , Admission ,
        // $this->call(AllocationSeeder::class);       // Fee , Admission
        $this->call(RuleSeeder::class);
    }
}
