<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rule extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guarded=[];
}
