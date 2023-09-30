<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Building;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Floor extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
