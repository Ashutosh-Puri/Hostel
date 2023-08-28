<?php

namespace App\Models;


use App\Models\Bed;
use App\Models\Floor;
use App\Models\Seated;
use App\Models\Facility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function Beds()
    {
        return $this->hasMany(Bed::class, 'room_id', 'id');
    }

    public function Facilities()
    {
        return $this->hasMany(Facility::class, 'room_id', 'id');
    }
    
    public function Seated()
    {
        return $this->belongsTo(Seated::class, 'seated_id', 'id');
    }
    
    public function Floor()
    {
        return $this->belongsTo(Floor::class);
    }
}
