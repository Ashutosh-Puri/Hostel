<?php

namespace App\Models;

use App\Models\Fee;
use App\Models\Room;
use App\Models\Seated;
use App\Models\Admission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seated extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded=[];

    public function rooms()
    {
        return $this->hasMany(Room::class)->withTrashed();
    }

    public function fees()
    {
        return $this->hasMany(Fee::class)->withTrashed();
    }

    public function admisstions()
    {
        return $this->hasMany(Admission::class)->withTrashed();
    }
}
