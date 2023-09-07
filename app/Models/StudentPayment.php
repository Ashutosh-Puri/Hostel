<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Admission;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentPayment extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function academicyear()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
