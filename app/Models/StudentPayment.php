<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Admission;
use App\Models\Transaction;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentPayment extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded=[];

    public function admission()
    {
        return $this->belongsTo(Admission::class)->withTrashed();
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
