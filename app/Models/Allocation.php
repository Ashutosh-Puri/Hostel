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
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allocation extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded = [];

    public function Bed()
    {
        return $this->belongsTo(Bed::class)->withTrashed();
    }

    public function Admission()
    {
        return $this->belongsTo(Admission::class)->withTrashed();
    }

    public function LocalRegisters()
    {
        return $this->hasMany(LocalRegister::class)->withTrashed();
    }

    public function ComeFromHomes()
    {
        return $this->hasMany(ComeFromHome::class)->withTrashed();
    }

    public function NightOuts()
    {
        return $this->hasMany(NightOut::class)->withTrashed();
    }

}
