<?php

namespace App\Models;

use App\Models\StudentPayment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admission extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function StudentPayments()
    {
        return $this->hasMany(StudentPayment::class, 'admission_id', 'id');
    }
}
