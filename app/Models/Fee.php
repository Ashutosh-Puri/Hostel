<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id', 'id');
    }
}
