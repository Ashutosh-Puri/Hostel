<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quota extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded=[];
   
    public function Class()
    {
        return $this->belongsTo(Classes::class)->withTrashed();
    }
    
    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class)->withTrashed();
    }
}
