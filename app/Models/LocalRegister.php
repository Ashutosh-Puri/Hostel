<?php

namespace App\Models;

use App\Models\Allocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LocalRegister extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function allocation()
    {
        return $this->belongsTo(Allocation::class);
    }
}
