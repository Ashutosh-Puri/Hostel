<?php

namespace App\Models;

use App\Models\StudentFine;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fine extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded=[];

    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class)->withTrashed();
    }

    public function studentfines()
    {
        return $this->hasMany(StudentFine::class)->withTrashed();
    }
}
