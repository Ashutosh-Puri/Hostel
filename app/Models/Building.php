<?php

namespace App\Models;

use App\Models\Floor;
use App\Models\Hostel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Floors()
    {
        return $this->hasMany(Floor::class);
    }

    public function Hostel()
    {
        return $this->belongsTo(Hostel::class);
    }
}
