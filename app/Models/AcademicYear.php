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


    public function fines()
    {
        return $this->hasMany(Fine::class);
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function studentfines()
    {
        return $this->hasMany(StudentFine::class);
    }

    public function studentpaymets()
    {
        return $this->hasMany(StudentPayment::class);
    }

    public function quotas()
    {
        return $this->hasMany(Quota::class);
    }

    public function studenteducations()
    {
        return $this->hasMany(AcademicYear::class);
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }


}