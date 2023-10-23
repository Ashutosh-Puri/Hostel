<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Building;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Floor extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded=[];

    public function rooms()
    {
        return $this->hasMany(Room::class)->withTrashed();
    }

    public function building()
    {
        return $this->belongsTo(Building::class)->withTrashed();
    }
}
