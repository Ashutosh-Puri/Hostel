<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Bed\AllBed;
use App\Http\Livewire\Backend\Fee\AllFee;
use App\Http\Livewire\Guestend\Home\Home;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Backend\Cast\AllCast;
use App\Http\Livewire\Backend\Fine\AllFine;
use App\Http\Livewire\Backend\Role\AllRole;
use App\Http\Livewire\Backend\Room\AllRoom;
use App\Http\Livewire\Backend\Rule\AllRule;
use App\Http\Livewire\Backend\Admin\AllAdmin;
use App\Http\Livewire\Backend\Class\AllClass;
use App\Http\Livewire\Backend\Floor\AllFloor;
use App\Http\Livewire\Backend\Qutota\AllQuota;
use App\Http\Livewire\Backend\Admin\AdminLogin;
use App\Http\Livewire\Backend\Hostel\AllHostel;
use App\Http\Livewire\Backend\Notice\AllNotice;
use App\Http\Livewire\Backend\Seated\AllSeated;
use App\Http\Livewire\Guestend\Gallery\Gallery;
use App\Http\Livewire\Frontend\StudentDashboard;
use App\Http\Livewire\Backend\College\AllCollege;
use App\Http\Livewire\Backend\Student\AllStudent;
use App\Http\Livewire\Backend\Admin\AdminDashboard;
use App\Http\Livewire\Backend\Building\AllBuilding;
use App\Http\Livewire\Backend\Category\AllCategory;
use App\Http\Livewire\Backend\Facility\AllFacility;
use App\Http\Livewire\Backend\Admission\AllAdmission;
use App\Http\Livewire\Backend\Allocation\AllAllocation;
use App\Http\Livewire\Backend\Permission\AllPermission;
use App\Http\Livewire\Backend\StudentFine\AllStudentFine;
use App\Http\Livewire\Frontend\Admission\StudentAdmission;
use App\Http\Livewire\Backend\AcademicYear\AllAcademicYear;
use App\Http\Livewire\Backend\PhotoGallery\AllPhotoGallery;
use App\Http\Livewire\Backend\RolePermission\AllRolePermission;
use App\Http\Livewire\Backend\StudentPayment\AllStudentPayment;
use App\Http\Livewire\Backend\StudentEducation\AllStudentEducation;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Guest Routes
Route::middleware(['guest:student'])->group(function () {

    // Admin Login Route
    // Route::get('admin/login', AdminLogin::class)->name('admin.login');

    // Home
    Route::get('/', Home::class)->name('home');

    // Gallery
    Route::get('gallery', Gallery::class)->name('gallery');

});



// Student Routes With Web Guard
Route::middleware(['auth:student','is_student','verified'])->group(function () {

   // Student Dashboard
   Route::get('student/dashboard', StudentDashboard::class)->name('student.dashboard');

   // Student Admission
   Route::get('student/admission', StudentAdmission::class)->name('student.admission');
});




//  Routes With admin Guard is_admin middleware 
Route::middleware(['auth:admin','is_admin','verified'])->group(function () {

    // Superadmin Routes With Admin Guard
    Route::group(['middleware' => ['role:Super Admin']], function () {

        // All Role
        Route::get('all/roles',AllRole::class)->name('all_role');

        // All Permission
        Route::get('all/permissions',AllPermission::class)->name('all_permission');
        
        // All Role Permission
        Route::get('all/rolewisepermission',AllRolePermission::class)->name('all_role_permission');

        // All Admin
        Route::get('all/admins',AllAdmin::class)->name('all_admin');

        // All College
        Route::get('all/colleges',AllCollege::class)->name('all_college');

        // All Hostel
        Route::get('all/hostels',AllHostel::class)->name('all_hostel');

    });


    // Admin Dashboard
    Route::get('admin/dashboard', AdminDashboard::class)->name('admin.dashboard');

    // // Admin Logout
    // Route::post('admin/logout', [AdminLogin::class, 'logout'])->name('admin.logout');

    // All Classes
    Route::get('all/classes',AllClass::class)->name('all_class');

    // All Building
    Route::get('all/buildings',AllBuilding::class)->name('all_building');

    // All Floor
    Route::get('all/floors',AllFloor::class)->name('all_floor');
    
    // All Seated
    Route::get('all/seateds',AllSeated::class)->name('all_seated');

    // All Room
    Route::get('all/rooms',AllRoom::class)->name('all_room');

    // All Bed
    Route::get('all/beds',AllBed::class)->name('all_bed');

    // All Facility
    Route::get('all/facilitys',AllFacility::class)->name('all_facility');

    // All Academic Year
    Route::get('all/academicyears',AllAcademicYear::class)->name('all_academic_year');

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

    // All Rule
    Route::get('all/rules',AllRule::class)->name('all_rule');

    // All Photo Gallery
    Route::get('all/photogallery',AllPhotoGallery::class)->name('all_photogallery');

    // All Notice
    Route::get('all/notices',AllNotice::class)->name('all_notice');


});


require __DIR__.'/student_auth.php';
require __DIR__.'/admin_auth.php';
