<?php

namespace App\Models;

use App\Models\College;
use App\Models\Building;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hostel extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded=[];

    public function buildings()
    {
        return $this->hasMany(Building::class)->withTrashed();
    }

    public function college()
    {
        return $this->belongsTo(College::class)->withTrashed();
    }
}
