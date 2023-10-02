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
        return $this->belongsTo(Classes::class);
    }
    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}
