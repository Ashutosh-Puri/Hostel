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
use App\Http\Livewire\Backend\Setting\Setting;
use App\Http\Livewire\Backend\Admin\AdminLogin;
use App\Http\Livewire\Backend\Hostel\AllHostel;
use App\Http\Livewire\Backend\Notice\AllNotice;
use App\Http\Livewire\Backend\Seated\AllSeated;
use App\Http\Livewire\Guestend\Gallery\Gallery;
use App\Http\Livewire\Frontend\StudentDashboard;
use App\Http\Livewire\Backend\College\AllCollege;
use App\Http\Livewire\Backend\Enquiry\AllEnquiry;
use App\Http\Livewire\Backend\Student\AllStudent;
use App\Http\Livewire\Backend\Admin\AdminDashboard;
use App\Http\Livewire\Backend\Building\AllBuilding;
use App\Http\Livewire\Backend\Category\AllCategory;
use App\Http\Livewire\Backend\Facility\AllFacility;
use App\Http\Livewire\Backend\Report\AllRoomReport;
use App\Http\Livewire\Guestend\Enquiry\ShowEnquiry;
use App\Http\Livewire\Backend\Admission\AllAdmission;
use App\Http\Livewire\Backend\Report\AllPaymentReport;
use App\Http\Livewire\Backend\Report\AllStudentReport;
use App\Http\Livewire\Backend\Allocation\AllAllocation;
use App\Http\Livewire\Backend\Permission\AllPermission;
use App\Http\Livewire\Backend\Report\AllAllocationReport;
use App\Http\Livewire\Backend\StudentFine\AllStudentFine;
use App\Http\Livewire\Frontend\Admission\StudentAdmission;
use App\Http\Livewire\Backend\AcademicYear\AllAcademicYear;
use App\Http\Livewire\Backend\PhotoGallery\AllPhotoGallery;
use App\Http\Livewire\Backend\RolePermission\AllRolePermission;
use App\Http\Livewire\Backend\StudentPayment\AllStudentPayment;
use App\Http\Livewire\Backend\StudentNightOut\AllStudentNightOut;
use App\Http\Livewire\Backend\StudentEducation\AllStudentEducation;
use App\Http\Livewire\Backend\StudentComeFromHome\AllStudentComeFromHome;
use App\Http\Livewire\Backend\StudentLocalRegister\AllStudentLocalRegister;

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
Route::middleware(['guest'])->group(function () {

    // Admin Login Route
    // Route::get('admin/login', AdminLogin::class)->name('admin.login');
    
    // Home
    Route::get('/', Home::class)->name('home');

    // Gallery
    Route::get('gallery', Gallery::class)->name('gallery');

    // Enquiry
    Route::get('enquiry', ShowEnquiry::class)->name('enquiry');

});



// Student Routes With Web Guard
Route::middleware(['auth:student','is_student','verified'])->group(function () {

   // Student Dashboard
   Route::get('student/dashboard', StudentDashboard::class)->name('student.dashboard');

   // Student Admission
   Route::get('student/admission', StudentAdmission::class)->name('student.admission');
});




//  Routes With admin Guard is_admin middleware 
Route::middleware(['auth:admin','is_admin'])->group(function () {

    // Superadmin Routes With Admin Guard
    Route::group(['middleware' => ['role:Super Admin']], function () {

        Route::group(['middleware' => ['permission:Access Role']], function () {
            // All Role
            Route::get('all/roles',AllRole::class)->name('all_role');
        });
    
        Route::group(['middleware' => ['permission:Access Permission']], function () {
            // All Permission
            Route::get('all/permissions',AllPermission::class)->name('all_permission'); 
        });
    
        Route::group(['middleware' => ['permission:Access Role Wise Permission']], function () {
           // All Role Permission
           Route::get('all/rolewisepermission',AllRolePermission::class)->name('all_role_permission');
        });
        
        Route::group(['middleware' => ['permission:Access Admin']], function () {
            // All Admin
            Route::get('all/admins',AllAdmin::class)->name('all_admin');
        });

        Route::group(['middleware' => ['permission:Access Setting']], function () {
            // Site Setting
            Route::get('site/setting',Setting::class)->name('site_setting');
        });
        
        Route::group(['middleware' => ['permission:Access College']], function () {
            // All College
            Route::get('all/colleges',AllCollege::class)->name('all_college');
        });
    
        Route::group(['middleware' => ['permission:Access Hostel']], function () {
            // All Hostel
            Route::get('all/hostels',AllHostel::class)->name('all_hostel');
        });

    });

    
    Route::group(['middleware' => ['permission:Access Admission']], function () {
        // All Admission
        Route::get('all/admissions',AllAdmission::class)->name('all_admission');
    });

    Route::group(['middleware' => ['permission:Access Dashboard']], function () {
        // Admin Dashboard
        Route::get('admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
    });

    Route::group(['middleware' => ['permission:Access Class']], function () {
        // All Classes
        Route::get('all/classes',AllClass::class)->name('all_class');
    });

    Route::group(['middleware' => ['permission:Access Building']], function () {
        // All Building
        Route::get('all/buildings',AllBuilding::class)->name('all_building');
    });

    Route::group(['middleware' => ['permission:Access Floor']], function () {
        // All Floor
        Route::get('all/floors',AllFloor::class)->name('all_floor');
    });

    Route::group(['middleware' => ['permission:Access Seated']], function () {
        // All Seated
        Route::get('all/seateds',AllSeated::class)->name('all_seated');
    });

    Route::group(['middleware' => ['permission:Access Room']], function () {
        // All Room
        Route::get('all/rooms',AllRoom::class)->name('all_room');
    });
    
    Route::group(['middleware' => ['permission:Access Bed']], function () {
        // All Bed
        Route::get('all/beds',AllBed::class)->name('all_bed');
    });

    Route::group(['middleware' => ['permission:Access Facility']], function () {
        // All Facility
        Route::get('all/facilitys',AllFacility::class)->name('all_facility');
    });

    Route::group(['middleware' => ['permission:Access Academic Year']], function () {
        // All Academic Year
        Route::get('all/academicyears',AllAcademicYear::class)->name('all_academic_year');
    });

    Route::group(['middleware' => ['permission:Access Fee']], function () {
        // All Fee
        Route::get('all/fees',AllFee::class)->name('all_fee');
    });

    Route::group(['middleware' => ['permission:Access Fine']], function () {
        // All Fine
        Route::get('all/fines',AllFine::class)->name('all_fine');
    });

    Route::group(['middleware' => ['permission:Access Student Fine']], function () {
        // All Student Fine
        Route::get('all/studentdues', AllStudentFine::class)->name('all_student_fine');
    });

    Route::group(['middleware' => ['permission:Access Student Payment']], function () {
        // All Student Payment
        Route::get('all/payments',AllStudentPayment::class)->name('all_student_payment');
    });

    Route::group(['middleware' => ['permission:Access Quota']], function () {
        // All Quota
        Route::get('all/quotas',AllQuota::class)->name('all_quota');
    });

    Route::group(['middleware' => ['permission:Access Student']], function () {
        // All Student
        Route::get('all/students',AllStudent::class)->name('all_student');
    });

    Route::group(['middleware' => ['permission:Access Student Education']], function () {
        // All Student Education
        Route::get('all/ducations',AllStudentEducation::class)->name('all_student_education');
    });

    Route::group(['middleware' => ['permission:Access Allocation']], function () {
        // All Allocation
        Route::get('all/allocations',AllAllocation::class)->name('all_allocation');
    });

    Route::group(['middleware' => ['permission:Access Cast']], function () {
        // All Cast
        Route::get('all/casts',AllCast::class)->name('all_cast');
    });

    Route::group(['middleware' => ['permission:Access Category']], function () {
        // All Category
        Route::get('all/categories',AllCategory::class)->name('all_category');
    });

    Route::group(['middleware' => ['permission:Access Rule']], function () {
        // All Rule
        Route::get('all/rules',AllRule::class)->name('all_rule');
    });

    Route::group(['middleware' => ['permission:Access Photo Gallery']], function () {
        // All Photo Gallery
        Route::get('all/photogallery',AllPhotoGallery::class)->name('all_photogallery');
    });

    Route::group(['middleware' => ['permission:Access Notice']], function () {
        // All Notice
        Route::get('all/notices',AllNotice::class)->name('all_notice');
    });



    Route::group(['middleware' => ['permission:Access Report']], function () {
        // All Student Report
        Route::get('all/studreports',AllStudentReport::class)->name('all_student_report');
    });

    Route::group(['middleware' => ['permission:Access Report']], function () {
        // All Room Report
        Route::get('all/reportsroom',AllRoomReport::class)->name('all_room_report');
    });
    
    Route::group(['middleware' => ['permission:Access Report']], function () {
        // All Room Report
        Route::get('all/reportpayment',AllPaymentReport::class)->name('all_payment_report');
    });

    Route::group(['middleware' => ['permission:Access Report']], function () {
        // All Allocation Report
        Route::get('all/reportallocation',AllAllocationReport::class)->name('all_allocation_report');
    });

    Route::group(['middleware' => ['permission:Access Forms']], function () {
        
        // All Enquiry
        Route::get('all/enquires',AllEnquiry::class)->name('all_enquiry');

        // All Student local Register
        Route::get('all/local/register',AllStudentLocalRegister::class)->name('all_student_local_register');
        // All Student Come From home
        Route::get('all/student/come/from/home',AllStudentComeFromHome::class)->name('all_student_come_from_home');
        // All Student Night Out
        Route::get('all/student/night/out',AllStudentNightOut::class)->name('all_student_night_out');
    });


});


require __DIR__.'/student_auth.php';
require __DIR__.'/admin_auth.php';
