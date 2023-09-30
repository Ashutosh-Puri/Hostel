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


    public function floors()
    {
        return $this->hasMany(Floor::class);
    }

    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }
}
