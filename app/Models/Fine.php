<?php

namespace App\Models;

use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fine extends Model
{
    use HasFactory;
    protected $guarded=[];



    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id', 'id');
    }
}
