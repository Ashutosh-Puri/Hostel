<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentProfile extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}