<?php

namespace App\Models;

use App\Models\Bed;
use App\Models\Fee;
use App\Models\Classes;
use App\Models\NightOut;
use App\Models\Admission;
use App\Models\ComeFromHome;
use App\Models\LocalRegister;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allocation extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function bed()
    {
        return $this->belongsTo(Bed::class);
    }

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }

    public function localregisters()
    {
        return $this->hasMany(LocalRegister::class);
    }

    public function comefromhomes()
    {
        return $this->hasMany(ComeFromHome::class);
    }

    public function nightouts()
    {
        return $this->hasMany(NightOut::class);
    }

}
