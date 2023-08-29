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

    public function Rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function Building()
    {
        return $this->belongsTo(Building::class);
    }
}
