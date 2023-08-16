<?php



use App\Models\Allocation;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Bed\AllBed;
use App\Http\Livewire\Backend\Fee\AllFee;
use App\Http\Livewire\Backend\Cast\AllCast;
use App\Http\Livewire\Backend\Fine\AllFine;
use App\Http\Livewire\Backend\Role\AllRole;
use App\Http\Livewire\Backend\Room\AllRoom;
use App\Http\Livewire\Backend\Admin\AllAdmin;
use App\Http\Livewire\Backend\Class\AllClass;
use App\Http\Livewire\Backend\Qutota\AllQuota;
use App\Http\Livewire\Backend\Admin\AdminLogin;
use App\Http\Livewire\Backend\Hostel\AllHostel;
use App\Http\Livewire\Frontend\StudentDashboard;
use App\Http\Livewire\Backend\College\AllCollege;
use App\Http\Livewire\Backend\Student\AllStudent;
use App\Http\Livewire\Backend\Admin\AdminDashboard;
use App\Http\Livewire\Backend\Building\AllBuilding;
use App\Http\Livewire\Backend\Category\AllCategory;
use App\Http\Livewire\Backend\Facility\AllFacility;
use App\Http\Livewire\Backend\Admission\AllAdmission;
use App\Http\Livewire\Backend\Allocation\AllAllocation;
use App\Http\Livewire\Backend\StudentFine\AllStudentFine;
use App\Http\Livewire\Backend\AcademicYear\AllAcademicYear;
use App\Http\Livewire\Backend\StudentPayment\AllStudentPayment;
use App\Http\Livewire\Backend\StudentProfile\AllStudentProfile;
use App\Http\Livewire\Backend\StudentEducation\AllStudentEducation;



Route::get('/', function () {
    return view('welcome');
});



// Guest Routes
Route::middleware(['guest'])->group(function () {

    // Admin Login Route
    Route::get('admin/login', AdminLogin::class)->name('admin.login');

    // Unauthorize Access
    Route::get('not/admin', function(){ return view('not_admin') ;})->name('not.admin');

    // Home
    Route::get('home', function () {
        return view('welcome');
    })->name('home');
});



// Student Routes With Web Guard
Route::middleware(['auth:web','verified'])->group(function () {

   // Student Dashboard
   Route::get('student/dashboard', StudentDashboard::class)->name('student.dashboard');
});



// Admin Routes With Admin Guard
Route::middleware(['auth:admin','check.role:superadmin',])->group(function () {

    // Admin Dashboard
    Route::get('admin/dashboard', AdminDashboard::class)->name('admin.dashboard');

    // Admin Logout
    Route::post('admin/logout', [AdminLogin::class, 'logout'])->name('admin.logout');

    // All Classes
    Route::get('all/classes',AllClass::class)->name('all_class');

    // All College
    Route::get('all/colleges',AllCollege::class)->name('all_college');

    // All Hostel
    Route::get('all/hostels',AllHostel::class)->name('all_hostel');

    // All Building
    Route::get('all/buildings',AllBuilding::class)->name('all_building');

    // All Academic Year
    Route::get('all/academicyears',AllAcademicYear::class)->name('all_academic_year');

    // All Facility
    Route::get('all/facilitys',AllFacility::class)->name('all_facility');

    // All Room
    Route::get('all/rooms',AllRoom::class)->name('all_room');

    // All Bed
    Route::get('all/beds',AllBed::class)->name('all_bed');

    // All Fee
    Route::get('all/fees',AllFee::class)->name('all_fee');

    // All Fine
    Route::get('all/fines',AllFine::class)->name('all_fine');

    // All Student Fine
    Route::get('all/studentdues', AllStudentFine::class)->name('all_student_fine');

    // All Student Payment
    Route::get('all/payments',AllStudentPayment::class)->name('all_student_payment');

    // All Quota
    Route::get('all/quotas',AllQuota::class)->name('all_quota');

    // All Student
    Route::get('all/students',AllStudent::class)->name('all_student');

    // All Admin
    Route::get('all/admins',AllAdmin::class)->name('all_admin');

    // All Role
    Route::get('all/roles',AllRole::class)->name('all_role');

    // All Admission
    Route::get('all/admissions',AllAdmission::class)->name('all_admission');

    // All Student Education
    Route::get('all/ducations',AllStudentEducation::class)->name('all_student_education');

    // All Allocation
    Route::get('all/allocations',AllAllocation::class)->name('all_allocation');

    // All Cast
    Route::get('all/casts',AllCast::class)->name('all_cast');

    // All Category
    Route::get('all/categories',AllCategory::class)->name('all_category');

});


require __DIR__.'/auth.php';
