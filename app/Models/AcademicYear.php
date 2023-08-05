<?php

namespace App\Models;

use App\Models\Fee;
use App\Models\Fine;
use App\Models\Quota;
use App\Models\StudentFine;
use App\Models\AcademicYear;
use App\Models\StudentPayment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicYear extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Fines()
    {
        return $this->hasMany(Fine::class, 'academic_year_id', 'id');
    }

    public function Fees()
    {
        return $this->hasMany(Fee::class, 'academic_year_id', 'id');
    }

    public function StudentFines()
    {
        return $this->hasMany(StudentFine::class, 'academic_year_id', 'id');
    }

    public function StudentPaymets()
    {
        return $this->hasMany(StudentPayment::class, 'academic_year_id', 'id');
    }

    public function Quota()
    {
        return $this->hasMany(Quota::class, 'academic_year_id', 'id');
    }
}