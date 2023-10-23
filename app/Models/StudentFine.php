<?php

namespace App\Models;

use App\Models\Fine;
use App\Models\Student;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentFine extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded=[];

    public function fine()
    {
        return $this->belongsTo(Fine::class)->withTrashed();
    }
    
    public function student()
    {
        return $this->belongsTo(Student::class)->withTrashed();
    }

    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class)->withTrashed();
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class)->withTrashed();
    }
}
