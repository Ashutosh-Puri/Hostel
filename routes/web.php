<?php



use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Bed\AllBed;
use App\Http\Livewire\Backend\Fee\AllFee;
use App\Http\Livewire\Backend\Fine\AllFine;
use App\Http\Livewire\Backend\Role\AllRole;
use App\Http\Livewire\Backend\Room\AllRoom;
use App\Http\Livewire\Backend\Admin\AllAdmin;
use App\Http\Livewire\Backend\Class\AllClass;
use App\Http\Livewire\Backend\Qutota\AllQuota;
use App\Http\Livewire\Backend\Admin\AdminLogin;
use App\Http\Livewire\Backend\Hostel\AllHostel;
use App\Http\Livewire\Backend\College\AllCollege;
use App\Http\Livewire\Backend\Student\AllStudent;
use App\Http\Livewire\Backend\Admin\AdminDashboard;
use App\Http\Livewire\Backend\Building\AllBuilding;
use App\Http\Livewire\Backend\Facility\AllFacility;
use App\Http\Livewire\Backend\Admission\AllAdmission;
use App\Http\Livewire\Backend\StudentFine\AllStudentFine;
use App\Http\Livewire\Backend\AcademicYear\AllAcademicYear;
use App\Http\Livewire\Backend\StudentPayment\AllStudentPayment;
use App\Http\Livewire\Backend\StudentProfile\AllStudentProfile;



Route::get('/', function () {
    return view('welcome');
});




// Authentication Routes (web guard for student authentication)
// Guest Routes
Route::middleware(['guest'])->group(function () {

    // Admin Login Route
    Route::get('admin/login', AdminLogin::class)->name('admin.login');

    // Unauthorize Access
    Route::get('not/admin', function(){ return view('not_admin') ;})->name('not.admin');

    // Admin Logout
    Route::post('admin/logout', [AdminLogin::class, 'logout'])->name('admin.logout');


    // Home
    Route::get('home', function () {
        return view('welcome');
    })->name('home');
});



// Student Routes With Web Guard
Route::middleware(['auth','verified'])->group(function () {
   
    Route::get('dashboard', function () {
        return view('student.dashboard');
    })->name('dashboard');

});



// Admin Routes With Admin Guard
Route::middleware(['auth:admin','check.role:superadmin'])->group(function () {

    // Admin Dashboard
    Route::get('admin/dashboard', AdminDashboard::class)->name('admin.dashboard');

    // All Classes
    Route::get('all_class',AllClass::class)->name('all_class');

    // All College
    Route::get('all_college',AllCollege::class)->name('all_college');

    // All Hostel
    Route::get('all_hostel',AllHostel::class)->name('all_hostel');

    // All Building
    Route::get('all_building',AllBuilding::class)->name('all_building');

    // All Academic Year
    Route::get('all_academic_year',AllAcademicYear::class)->name('all_academic_year');

    // All Facility
    Route::get('all_facility',AllFacility::class)->name('all_facility');

    // All Room
    Route::get('all_room',AllRoom::class)->name('all_room');

    // All Bed
    Route::get('all_bed',AllBed::class)->name('all_bed');

    // All Fee
    Route::get('all_fee',AllFee::class)->name('all_fee');

    // All Fine
    Route::get('all_fine',AllFine::class)->name('all_fine');

    // All Student Fine
    Route::get('all_stud_fine', AllStudentFine::class)->name('all_student_fine');

    // All Student Payment
    Route::get('all_stud_payment',AllStudentPayment::class)->name('all_student_payment');

    // All Quota
    Route::get('all_quota',AllQuota::class)->name('all_quota');

    // All Student
    Route::get('all_student',AllStudent::class)->name('all_student');

    // All Student Profile
    Route::get('all_stud_profile',AllStudentProfile::class)->name('all_student_profile');

    // All Admin
    Route::get('all_admin',AllAdmin::class)->name('all_admin');

    // All Role
    Route::get('all_role',AllRole::class)->name('all_role');

    // All Admission
    Route::get('all_admission',AllAdmission::class)->name('all_admission');



    
});


require __DIR__.'/auth.php';
