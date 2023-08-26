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
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard="student";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'mobile_verified_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function StudentFines()
    {
        return $this->hasMany(StudentFine::class, 'student_id', 'id');
    }

    public function StudentPayments()
    {
        return $this->hasMany(StudentPayment::class, 'student_id', 'id');
    }

    public function StudentEducations()
    {
        return $this->hasMany(StudentEducation::class, 'student_id', 'id');
    }

    public function Admissions()
    {
        return $this->hasMany(Admission::class, 'student_id', 'id');
    }

    public function Cast()
    {
        return $this->belongsTo(Cast::class);
    }
}
