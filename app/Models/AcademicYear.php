<?php

namespace App\Models;

use App\Models\Fee;
use App\Models\Fine;
use App\Models\Quota;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\StudentFine;
use App\Models\AcademicYear;
use App\Models\StudentPayment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicYear extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Fines()
    {
        return $this->hasMany(Fine::class);
    }

    public function Fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function StudentFines()
    {
        return $this->hasMany(StudentFine::class);
    }

    public function StudentPaymets()
    {
        return $this->hasMany(StudentPayment::class);
    }

    public function Quotas()
    {
        return $this->hasMany(Quota::class);
    }

    public function StudentEducations()
    {
        return $this->hasMany(AcademicYear::class);
    }

    public function Admissions()
    {
        return $this->hasMany(Admission::class);
    }


}