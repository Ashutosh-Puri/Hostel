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

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function admisstions()
    {
        return $this->hasMany(Admission::class);
    }
}
