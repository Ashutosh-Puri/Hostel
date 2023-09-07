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


    public function fine()
    {
        return $this->belongsTo(Fine::class);
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
