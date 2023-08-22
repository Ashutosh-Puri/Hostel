<?php

namespace App\Models;

use App\Models\Fee;
use App\Models\Room;
use App\Models\Seated;
use App\Models\Admission;
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

    public function Fees()
    {
        return $this->hasMany(Fee::class, 'seated_id', 'id');
    }

    public function Admisstions()
    {
        return $this->hasMany(Admission::class, 'seated_id', 'id');
    }
}
