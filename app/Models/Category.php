<?php

namespace App\Models;

use App\Models\Cast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded = [];

    public function casts()
    {
        return $this->hasMany(Cast::class)->withTrashed();
    }
}
