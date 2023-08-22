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
        return $this->hasMany(StudentPayment::class, 'admission_id', 'id');
    }

    public function Student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function Class()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    

    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id', 'id');
    }

    public function Seated()
    {
        return $this->belongsTo(Seated::class, 'seated_id', 'id');
    }

    public function StudentEducations()
    {
        return $this->hasMany(StudentEducation::class, 'admission_id', 'id');
    }

    public function Allocations()
    {
        return $this->hasMany(Allocation::class, 'admission_id', 'id');
    }
}
