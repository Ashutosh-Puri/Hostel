<?php

namespace App\Models;

use App\Models\Allocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fee extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id', 'id');
    }

    public function Allocations()
    {
        return $this->hasMany(Allocation::class, 'fee_id', 'id');
    }
}
