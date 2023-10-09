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


    public function StudentPayments()
    {
        return $this->hasMany(StudentPayment::class);
    }

    public function Student()
    {
        return $this->belongsTo(Student::class);
    }

    public function Class()
    {
        return $this->belongsTo(Classes::class);
    }


    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function Seated()
    {
        return $this->belongsTo(Seated::class);
    }

    public function StudentEducations()
    {
        return $this->hasMany(StudentEducation::class ,'last_class_id','id');
    }

    public function Allocations()
    {
        return $this->hasMany(Allocation::class);
    }

    public function allocation()
    {
        return $this->hasOne(Allocation::class);
    }

}
