<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Admission;
use App\Models\Allocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bed extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function Room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function Admissions()
    {
        return $this->hasMany(Admission::class, 'bed_id', 'id');
    }


    public function Allocations()
    {
        return $this->hasMany(Allocation::class, 'bed_id', 'id');
    }
}
