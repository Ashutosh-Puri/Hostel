<?php

namespace App\Models;

use App\Models\Quota;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\StudentEducation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Quotas()
    {
        return $this->hasMany(Quota::class, 'class_id', 'id');
    }


    public function StudentEducations()
    {
        return $this->hasMany(StudentEducation::class, 'last_class_id', 'id');
    }

    public function Admissions()
    {
        return $this->hasMany(Admission::class, 'class_id', 'id');
    }

    public function Allocations()
    {
        return $this->hasMany(Allocation::class, 'class_id', 'id');
    }
}
