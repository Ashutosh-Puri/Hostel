<?php

namespace App\Models;

use App\Models\Cast;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\Attendance;
use App\Models\StudentFine;
use App\Models\Transaction;
use App\Models\StudentPayment;
use App\Models\StudentProfile;
use App\Models\StudentEducation;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Notifications\StudentResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    
    protected $dates=['deleted_at'];

    protected $guard="student";

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StudentResetPasswordNotification($token));
    }

    public function routeNotificationForMail()
    {
        return $this->email;
    }

    public function routeNotificationForVonage(Notification $notification): string
    {
        return $this->mobile;
    }

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

    public function getIsStudentAttribute()
    {
        return true;
    }

    public function studentfines()
    {
        return $this->hasMany(StudentFine::class)->withTrashed();
    }

    public function studentpayments()
    {
        return $this->hasMany(StudentPayment::class)->withTrashed();
    }

    public function studenteducations()
    {
        return $this->hasMany(StudentEducation::class)->withTrashed();
    }

    public function admissions()
    {
        return $this->hasMany(Admission::class)->withTrashed();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class)->withTrashed();
    }

    public function cast()
    {
        return $this->belongsTo(Cast::class)->withTrashed();
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class)->withTrashed();
    }

    public function getBedId()
    {
        $academicYear = AcademicYear::where('year', now()->format('Y'))->first();
        if ($academicYear) {
            $admission = Admission::where('academic_year_id', $academicYear->id)->where('student_id', $this->id)->first();
            if ($admission) {
                $allocation = $admission->allocation;
                return $allocation ? $allocation->bed_id : 0;
            }
        }
        return 0;
    }

}
