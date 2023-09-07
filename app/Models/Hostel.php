<?php

namespace App\Models;

use App\Models\College;
use App\Models\Building;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hostel extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function buildings()
    {
        return $this->hasMany(Building::class);
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
