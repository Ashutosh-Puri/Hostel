<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Admission;
use App\Models\Allocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bed extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded=[];

    public function room()
    {
        return $this->belongsTo(Room::class)->withTrashed();
    }

    public function allocations()
    {
        return $this->hasMany(Allocation::class)->withTrashed();
    }
}
