<?php

namespace App\Models;

use App\Models\Room;
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
}
