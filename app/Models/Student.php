<?php

namespace App\Models;

use App\Models\Cast;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\StudentFine;
use App\Models\StudentPayment;
use App\Models\StudentProfile;
use App\Models\StudentEducation;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Notifications\StudentResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StudentResetPasswordNotification($token));
    }

    protected $guard="student";

    protected $fillable = [
        'username',
        'email',
        'password',
        'status',
        'mobile',
        'photo',
        'member_id',
        'prn',
        'abc_id',
        'cast_id',
        'eligibility_no',
        'last_login',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'mobile_verified_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function studentfines()
    {
        return $this->hasMany(StudentFine::class);
    }

    public function studentpayments()
    {
        return $this->hasMany(StudentPayment::class);
    }

    public function studenteducations()
    {
        return $this->hasMany(StudentEducation::class);
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }

    public function cast()
    {
        return $this->belongsTo(Cast::class);
    }
}
