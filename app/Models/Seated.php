<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Seated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seated extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Rooms()
    {
        return $this->hasMany(Room::class, 'seated_id', 'id');
    }
}
