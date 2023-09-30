<?php

namespace App\Models;

use App\Models\Seated;
use App\Models\Allocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fee extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function AcademicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function Seated()
    {
        return $this->belongsTo(Seated::class);
    }

}
