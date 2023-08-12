<?php

namespace App\Models;

use App\Models\Fee;
use App\Models\Classes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allocation extends Model
{
    use HasFactory;

    protected $guarded = [];




    public function Student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function Fee()
    {
        return $this->belongsTo(Fee::class, 'fee_id', 'id');
    }

    public function Bed()
    {
        return $this->belongsTo(Bed::class, 'bed_id', 'id');
    }

    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id', 'id');
    }

    public function Class()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

}
