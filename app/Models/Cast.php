<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cast extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Students()
    {
        return $this->hasMany(Student::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
