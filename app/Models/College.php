<?php

namespace App\Models;

use App\Models\Hostel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class College extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function Hostels()
    {
        return $this->hasMany(Hostel::class, 'hostel_id', 'id');
    }
}