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

    public function Buildings()
    {
        return $this->hasMany(Building::class);
    }

    public function College()
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }
}
