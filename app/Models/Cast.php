<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cast extends Model
{
    use HasFactory;


    
    protected $guarded = [];

    public function Categorys()
    {
        return $this->hasMany(Category::class, 'cast_id', 'id');
    }
}
