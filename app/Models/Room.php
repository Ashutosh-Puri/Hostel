<?php

namespace App\Models;


use App\Models\Bed;
use App\Models\Floor;
use App\Models\Seated;
use App\Models\Facility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded=[];

    public function beds()
    {
        return $this->hasMany(Bed::class)->withTrashed();
    }

    public function facilities()
    {
        return $this->hasMany(Facility::class)->withTrashed();
    }
    
    public function seated()
    {
        return $this->belongsTo(Seated::class)->withTrashed();
    }
    
    public function floor()
    {
        return $this->belongsTo(Floor::class)->withTrashed();
    }
}
