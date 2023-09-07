<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NightOut extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function allocation()
    {
        return $this->belongsTo(Allocation::class);
    }
}
