<?php

namespace App\Models;

use App\Models\Quota;
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
}
