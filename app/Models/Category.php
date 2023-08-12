<?php

namespace App\Models;

use App\Models\Cast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Cast()
    {
        return $this->belongsTo(Cast::class, 'cast_id', 'id');
    }
}
