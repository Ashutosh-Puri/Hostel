<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Admission;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentEducation extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded=[];

    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class)->withTrashed();
    }

    public function student()
    {
        return $this->belongsTo(Student::class)->withTrashed();
    }

    public function Class()
    {
        return $this->belongsTo(Classes::class , 'last_class_id','id')->withTrashed();
    }

    public function admission()
    {
        return $this->belongsTo(Admission::class)->withTrashed();
    }
}
