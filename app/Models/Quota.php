<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quota extends Model
{
    use HasFactory;
    protected $guarded=[];


   
    public function Class()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }
    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id', 'id');
    }
}
