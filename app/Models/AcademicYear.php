<?php

namespace App\Models;

use App\Models\Fee;
use App\Models\Fine;
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
}