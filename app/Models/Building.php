<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function Rooms()
    {
        return $this->hasMany(Room::class, 'building_id_id', 'id');
    }
}
