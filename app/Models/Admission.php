<?php

namespace App\Models;

use App\Models\Bed;
use App\Models\Seated;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Allocation;
use App\Models\AcademicYear;
use App\Models\StudentPayment;
use App\Models\StudentEducation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admission extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function studentpayments()
    {
        return $this->hasMany(StudentPayment::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }


    public function academicyear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function seated()
    {
        return $this->belongsTo(Seated::class);
    }

    public function studenteducations()
    {
        return $this->hasMany(StudentEducation::class);
    }

    public function allocations()
    {
        return $this->hasMany(Allocation::class);
    }
}
