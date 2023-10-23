<?php

namespace App\Models;

use App\Models\Quota;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\StudentEducation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded = [];

    public function quotas()
    {
        return $this->hasMany(Quota::class)->withTrashed();
    }

    public function studenteducations()
    {
        return $this->hasMany(StudentEducation::class)->withTrashed();
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class)->withTrashed();
    }
}
