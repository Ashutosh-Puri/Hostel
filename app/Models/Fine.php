<?php

namespace App\Models;

use App\Models\StudentFine;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fine extends Model
{
    use HasFactory;
    protected $guarded=[];



    public function academicyear()
    {
        return $this->belongsTo(AcademicYear::class);
    }


    public function studentfines()
    {
        return $this->hasMany(StudentFine::class);
    }
}
