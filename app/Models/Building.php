<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Hostel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Rooms()
    {
        return $this->hasMany(Room::class, 'building_id', 'id');
    }

    public function Hostel()
    {
        return $this->belongsTo(Hostel::class, 'hostel_id', 'id');
    }
}
