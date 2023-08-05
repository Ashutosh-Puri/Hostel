<?php

namespace App\Models;

use App\Models\Fine;
use App\Models\Student;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentFine extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function Fine()
    {
        return $this->belongsTo(Fine::class, 'fine_id', 'id');
    }
    public function Student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id', 'id');
    }
}
