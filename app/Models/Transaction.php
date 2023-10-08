<?php

namespace App\Models;

use App\Models\Student;
use App\Models\StudentFine;
use App\Models\StudentPayment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function studentpayment()
    {
        return $this->belongsTo(StudentPayment::class);
    }

    public function studentfine()
    {
        return $this->belongsTo(StudentFine::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }



}