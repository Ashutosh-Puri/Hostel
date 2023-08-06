<?php


use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Bed\AllBed;
use App\Http\Livewire\Backend\Fee\AllFee;
use App\Http\Livewire\Backend\Fine\AllFine;
use App\Http\Livewire\Backend\Room\AllRoom;
use App\Http\Livewire\Backend\Class\AllClass;
use App\Http\Livewire\Backend\Qutota\AllQuota;
use App\Http\Livewire\Backend\Student\AllStudent;
use App\Http\Livewire\Backend\Building\AllBuilding;
use App\Http\Livewire\Backend\Facility\AllFacility;
use App\Http\Livewire\Backend\StudentFine\AllStudentFine;
use App\Http\Livewire\Backend\AcademicYear\AllAcademicYear;
use App\Http\Livewire\Backend\StudentPayment\AllStudentPayment;
use App\Http\Livewire\Backend\StudentProfile\AllStudentProfile;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    Route::get('dashboard', function () {
        return view('student.dashboard');
    })->name('dashboard');
    
});

Route::get('all_class',AllClass::class)->name('all_class');
Route::get('all_building',AllBuilding::class)->name('all_building');
Route::get('all_academic_year',AllAcademicYear::class)->name('all_academic_year');
Route::get('all_facility',AllFacility::class)->name('all_facility');
Route::get('all_room',AllRoom::class)->name('all_room');
Route::get('all_bed',AllBed::class)->name('all_bed');
Route::get('all_fee',AllFee::class)->name('all_fee');
Route::get('all_fine',AllFine::class)->name('all_fine');
Route::get('all_student_fine', AllStudentFine::class)->name('all_student_fine');
Route::get('all_student_payment',AllStudentPayment::class)->name('all_student_payment');
Route::get('all_quota',AllQuota::class)->name('all_quota');
Route::get('all_student',AllStudent::class)->name('all_student');
Route::get('all_student_profile',AllStudentProfile::class)->name('all_student_profile');



require __DIR__.'/auth.php';
