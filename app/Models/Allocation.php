<?php

namespace App\Models;

use App\Models\Bed;
use App\Models\Fee;
use App\Models\Classes;
use App\Models\Admission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allocation extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function Fee()
    {
        return $this->belongsTo(Fee::class, 'fee_id', 'id');
    }

    public function Bed()
    {
        return $this->belongsTo(Bed::class, 'bed_id', 'id');
    }

    public function Admission()
    {
        return $this->belongsTo(Admission::class, 'admission_id', 'id');
    }

}
