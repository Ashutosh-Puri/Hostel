<?php

namespace App\Models;

use App\Models\Floor;
use App\Models\Hostel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded = [];

    public function floors()
    {
        return $this->hasMany(Floor::class)->withTrashed();
    }

    public function hostel()
    {
        return $this->belongsTo(Hostel::class)->withTrashed();
    }
}
