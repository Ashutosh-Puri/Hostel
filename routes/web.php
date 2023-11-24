<?php


use App\Models\Allocation;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Bed\AllBed;
use App\Http\Livewire\Backend\Fee\AllFee;
use App\Http\Livewire\Guestend\Home\Home;
use App\Http\Livewire\Guestend\Team\Team;
use App\Http\Livewire\Backend\Cast\AllCast;
use App\Http\Livewire\Backend\Fine\AllFine;
use App\Http\Livewire\Backend\Role\AllRole;
use App\Http\Livewire\Backend\Room\AllRoom;
use App\Http\Livewire\Backend\Rule\AllRule;
use App\Http\Livewire\Guestend\About\About;
use App\Http\Livewire\Backend\Admin\AllAdmin;
use App\Http\Livewire\Backend\Class\AllClass;
use App\Http\Livewire\Backend\Floor\AllFloor;
use App\Http\Livewire\Backend\Qutota\AllQuota;
use App\Http\Livewire\Backend\RFID\AssignRFID;
use App\Http\Livewire\Backend\Setting\Setting;
use App\Http\Livewire\Backend\Admin\AdminLogin;
use App\Http\Livewire\Backend\Hostel\AllHostel;
use App\Http\Livewire\Backend\Notice\AllNotice;
use App\Http\Livewire\Backend\Seated\AllSeated;
use App\Http\Livewire\Guestend\Gallery\Gallery;
use App\Http\Livewire\Frontend\StudentDashboard;
use App\Http\Livewire\Backend\College\AllCollege;
use App\Http\Livewire\Backend\Contact\AllContact;
use App\Http\Livewire\Backend\Enquiry\AllEnquiry;
use App\Http\Livewire\Backend\Student\AllStudent;
use App\Http\Livewire\Guestend\Contact\Contactus;
use App\Http\Livewire\Guestend\Notice\ShowNotice;
use App\Http\Livewire\Backend\Admin\AdminDashboard;
use App\Http\Livewire\Backend\Building\AllBuilding;
use App\Http\Livewire\Backend\Category\AllCategory;
use App\Http\Livewire\Backend\Facility\AllFacility;
use App\Http\Livewire\Backend\Report\AllRoomReport;
use App\Http\Livewire\Guestend\Enquiry\ShowEnquiry;
use App\Http\Livewire\Guestend\ViewRules\ViewRules;
use App\Http\Livewire\Backend\Admission\AllAdmission;
use App\Http\Livewire\Backend\MeritList\AllMeritList;
use App\Http\Livewire\Frontend\StudentFee\StudentFee;
use App\Http\Livewire\Backend\Razorpay\RazorpayOrders;
use App\Http\Livewire\Backend\Report\AllPaymentReport;
use App\Http\Livewire\Backend\Report\AllStudentReport;
use App\Http\Livewire\Backend\Allocation\AllAllocation;
use App\Http\Livewire\Backend\Attendance\AllAttendance;
use App\Http\Livewire\Backend\Permission\AllPermission;
use App\Http\Livewire\Backend\Razorpay\RazorpayPayment;
use App\Http\Livewire\Backend\Razorpay\RazorpayRefunds;
use App\Http\Livewire\Guestend\Meritlist\ViewMeritList;
use App\Http\Livewire\Backend\Razorpay\RazorpayPayments;
use App\Http\Livewire\Backend\Report\AllAllocationReport;
use App\Http\Livewire\Backend\Report\AllAttendanceReport;
use App\Http\Livewire\Backend\StudentFine\AllStudentFine;
use App\Http\Livewire\Backend\Transaction\AllTransaction;
use App\Http\Livewire\Frontend\Admission\StudentAdmission;
use App\Http\Livewire\Backend\AcademicYear\AllAcademicYear;
use App\Http\Livewire\Backend\PhotoGallery\AllPhotoGallery;
use App\Http\Livewire\Guestend\RecentStudent\RecentStudent;
use App\Http\Controllers\Backend\PDF\MeritListPdfController;
use App\Http\Controllers\Frontend\StudentRazorpayController;
use App\Http\Livewire\Guestend\Meritlist\AdmissionMeritList;
use App\Http\Controllers\Backend\PDF\AttendancePdfController;
use App\Http\Controllers\Backend\PDF\FeeRecipetPdfController;
use App\Http\Controllers\Backend\PDF\RoomReportPdfController;
use App\Http\Controllers\Backend\Razorpay\RazorpayController;
use App\Http\Livewire\Frontend\StudentPayFine\StudentPayFine;
use App\Http\Controllers\Backend\PDF\FineRecipetPdfController;
use App\Http\Controllers\Backend\PDF\NightOutFormPdfController;
use App\Http\Livewire\Backend\RolePermission\AllRolePermission;
use App\Http\Livewire\Backend\StudentPayment\AllStudentPayment;
use App\Http\Livewire\Frontend\StudentNightOut\StudentNightOut;
use App\Http\Controllers\Backend\PDF\AdmissionFormPdfController;
use App\Http\Controllers\Backend\PDF\PaymentReportPdfController;
use App\Http\Controllers\Backend\PDF\StudentReportPdfController;
use App\Http\Controllers\Backend\Attendance\AttendanceController;
use App\Http\Controllers\Frontend\StudentFeeRecipetPdfController;
use App\Http\Livewire\Backend\StudentNightOut\AllStudentNightOut;
use App\Http\Controllers\Frontend\StudentFineRecipetPdfController;
use App\Http\Controllers\Backend\PDF\AllocationReportPdfController;
use App\Http\Controllers\Backend\PDF\AttendanceReportPdfController;
use App\Http\Controllers\Frontend\StudentNightOutFormPdfController;
use App\Http\Livewire\Backend\StudentEducation\AllStudentEducation;
use App\Http\Controllers\Frontend\StudentAdmissionFormPdfController;
use App\Http\Livewire\Frontend\StudentComeFromHome\StudentComeFromHome;
use App\Http\Livewire\Backend\StudentComeFromHome\AllStudentComeFromHome;
use App\Http\Livewire\Frontend\StudentLocalRegister\StudentLocalRegister;
use App\Http\Livewire\Backend\StudentLocalRegister\AllStudentLocalRegister;


// Guest Routes
Route::middleware(['guest'])->group(function () {

    // Home
    Route::get('/', Home::class)->name('home');

    // Gallery
    Route::get('gallery', Gallery::class)->name('gallery');

    // Enquiry
    Route::get('enquiry', ShowEnquiry::class)->name('enquiry');

    // About
    Route::get('about', About::class)->name('about');

    // Contact
    Route::get('contact', Contactus::class)->name('contact');

    // Rules
    Route::get('rules', ViewRules::class)->name('rules');

    // Notice
    Route::get('notice', ShowNotice::class)->name('notice');

    // Team
    Route::get('team', Team::class)->name('team');

    // Merit List
    Route::get('meritform', AdmissionMeritList::class)->name('meritform');

    // View Merit List
    Route::get('meritlist', ViewMeritList::class)->name('meritlist');
    
    // Record Attendance
    Route::post('getrfid', [AttendanceController::class,'recordAttendance'])->name('getrfid');

    // View Scan RFID
    Route::get('scan', RecentStudent::class)->name('scan');

});

// Student Routes With student Guard And  is_student middeleware
Route::middleware(['auth:student','is_student','verified'])->group(function () {

    // Student Dashboard
    Route::get('student/dashboard', StudentDashboard::class)->name('student.dashboard');

    // Student Admission
    Route::get('student/admission', StudentAdmission::class)->name('student.admission');

    // Student view Admission Form
    Route::get('student/view/admission_form/{id}',[StudentAdmissionFormPdfController::class,'view_pdf'])->name('student_view_admission_form');

    // Student Download Admission Form
    Route::get('student/download/admission_form/{id}',[StudentAdmissionFormPdfController::class,'download_pdf'])->name('student_download_admission_form');

    // Student Come From Home
    Route::get('student/come_from_home', StudentComeFromHome::class)->name('student.come_from_home');

    // Student Local Register
    Route::get('student/local_register', StudentLocalRegister::class)->name('student.local_register');

    // Student Night Out
    Route::get('student/night_out', StudentNightOut::class)->name('student.night_out');

    // Student View Night Out
    Route::get('student/view/night_out_form/{id}',[StudentNightOutFormPdfController::class,'view_pdf'])->name('student_view_night_out_form');

    // Student Download Night Out
    Route::get('student/download/night_out_form/{id}',[StudentNightOutFormPdfController::class,'download_pdf'])->name('student_download_night_out_form');

    // Student Fee
    Route::get('student/student_fee', StudentFee::class)->name('student.student_fee');

    //Student Pay Fee
    Route::get('student/pay/fee/{id}',[StudentRazorpayController::class,'pay_fee'])->name('student_pay_fee');

    // Student Payment Success Verify Payment
    Route::post('student/fee/payment/verify',[StudentRazorpayController::class,'fee_payment_verify'])->name('student_fee_payment_verify');

    // Student Payment Fail
    Route::post('student/fee/payment/fail',[StudentRazorpayController::class,'fee_payment_fail'])->name('student_fee_payment_fail');

    // Student Refund Fee
    Route::get('student/refund/fee/{id}',[StudentRazorpayController::class,'refund_fee'])->name('student_refund_fee');

    // Student view Fee reciept
    Route::get('student/view/fee_recipet/{id}',[StudentFeeRecipetPdfController::class,'view_pdf'])->name('student.view_fee_recipet');

    // Student download Fee reciept
    Route::get('student/download/fee_recipet/{id}',[StudentFeeRecipetPdfController::class,'download_pdf'])->name('student.download_fee_recipet');

    // Student Fine
    Route::get('student/student_fine', StudentPayFine::class)->name('student.student_fine');

    // Student Pay Fine
    Route::get('student/pay/fine/{id}',[StudentRazorpayController::class,'pay_fine'])->name('student_pay_fine');

    // Student Fine Success Verify Payment
    Route::post('student/fine/payment/verify',[StudentRazorpayController::class,'fine_payment_verify'])->name('student_fine_payment_verify');

    // Student Fine Payment Fail
    Route::post('student/fine/payment/fail',[StudentRazorpayController::class,'fine_payment_fail'])->name('student_fine_payment_fail');

    // Student Fine Payment Refund
    Route::get('student/refund/fine/{id}',[StudentRazorpayController::class,'refund_fine'])->name('student_refund_fine');

    // Student view Fine reciept
    Route::get('student/view/fine_recipet/{id}',[StudentFineRecipetPdfController::class,'view_pdf'])->name('student.view_fine_recipet');

    // Student download Fine reciept
    Route::get('student/download/fine_recipet/{id}',[StudentFineRecipetPdfController::class,'download_pdf'])->name('student.download_fine_recipet');

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

        Route::group(['middleware' => ['permission:Access Site Setting']], function () {
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

    Route::group(['middleware' => ['permission:View Admission Form']], function () {
        // view Admission Form
        Route::get('view/admission_form/{id}',[AdmissionFormPdfController::class,'view_pdf'])->name('view_admission_form');
    });

    Route::group(['middleware' => ['permission:Download Admission Form']], function () {
        // Download Admission Form
        Route::get('download/admission_form/{id}',[AdmissionFormPdfController::class,'download_pdf'])->name('download_admission_form');
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

    Route::group(['middleware' => ['permission:Access Student Report']], function () {
        // All Student Report
        Route::get('all/studreports',AllStudentReport::class)->name('all_student_report');
    });

    Route::group(['middleware' => ['permission:Access Student Report']], function () {
        // All Attendance Report
        Route::get('all/attenreport',AllAttendanceReport::class)->name('all_attendance_report');
    });

    Route::group(['middleware' => ['permission:Access Room Report']], function () {
        // All Room Report
        Route::get('all/reportsroom',AllRoomReport::class)->name('all_room_report');
    });

    Route::group(['middleware' => ['permission:Access Payment Report']], function () {
        // All Room Report
        Route::get('all/reportpayment',AllPaymentReport::class)->name('all_payment_report');
    });

    Route::group(['middleware' => ['permission:Access Allocation Report']], function () {
        // All Allocation Report
        Route::get('all/reportallocation',AllAllocationReport::class)->name('all_allocation_report');
    });

    Route::group(['middleware' => ['permission:Access Enquiry Form']], function () {
        // All Enquiry
        Route::get('all/enquires',AllEnquiry::class)->name('all_enquiry');
    });

    Route::group(['middleware' => ['permission:Access Student Night Out Form']], function () {
        // All Student Night Out
        Route::get('all/student/night/out',AllStudentNightOut::class)->name('all_student_night_out');
    });

    Route::group(['middleware' => ['permission:Access Student Local Register Form']], function () {
        // All Student local Register
        Route::get('all/local/register',AllStudentLocalRegister::class)->name('all_student_local_register');
    });

    Route::group(['middleware' => ['permission:Access Student Come From Home Form']], function () {
        // All Student Come From home
        Route::get('all/student/come/from/home',AllStudentComeFromHome::class)->name('all_student_come_from_home');
    });

    Route::group(['middleware' => ['permission:Access Transaction']], function () {
        // All Transaction
        Route::get('all/transactions',AllTransaction::class)->name('all_transaction');
    });

    Route::group(['middleware' => ['permission:Access Contact']], function () {
        // All Contact
        Route::get('all/contacts',AllContact::class)->name('all_contact');
    });

    // Razorpay
    Route::group(['middleware' => ['permission:Access Razorpay Payments']], function () {
        // Razorpay Payments
        Route::get('razorapay/payments',RazorpayPayments::class)->name('razorpay_payments');
    });

    Route::group(['middleware' => ['permission:Access Razorpay Orders']], function () {
        // Razorpay Orders
        Route::get('razorapay/orders',RazorpayOrders::class)->name('razorpay_orders');
    });

    Route::group(['middleware' => ['permission:Access Razorpay Refunds']], function () {
        // Razorpay Refunds
        Route::get('razorapay/refunds',RazorpayRefunds::class)->name('razorpay_refunds');
    });

    Route::group(['middleware' => ['permission:Pay Student Fine']], function () {
        // Pay Fine And Refund Fine
        Route::get('pay/fine/{id}',[RazorpayController::class,'pay_fine'])->name('pay_fine');
        Route::get('refund/fine/{id}',[RazorpayController::class,'refund_fine'])->name('refund_fine');
        Route::post('fine/payment/verify',[RazorpayController::class,'fine_payment_verify'])->name('fine_payment_verify');
        Route::post('fine/payment/fail',[RazorpayController::class,'fine_payment_fail'])->name('fine_payment_fail');
    });

    Route::group(['middleware' => ['permission:Pay Student Payment']], function () {
        // Pay Fee And Refund Fee
        Route::get('pay/fee/{id}',[RazorpayController::class,'pay_fee'])->name('pay_fee');
        Route::get('refund/fee/{id}',[RazorpayController::class,'refund_fee'])->name('refund_fee');
        Route::post('fee/payment/verify',[RazorpayController::class,'fee_payment_verify'])->name('fee_payment_verify');
        Route::post('fee/payment/fail',[RazorpayController::class,'fee_payment_fail'])->name('fee_payment_fail');
    });
    
    Route::group(['middleware' => ['permission:Access Merit List']], function () {
        // All Merit List
        Route::get('all/merit_list',AllMeritList::class)->name('all_merit_list');
    });
    
    Route::group(['middleware' => ['permission:View Merit List']], function () {
        // View Merit List
        Route::get('admin/view/merit_list/{array}',[MeritListPdfController::class,'view_pdf'])->name('admin_view_merit_list');
    });
    
    Route::group(['middleware' => ['permission:Download Merit List']], function () {
        // Download Merit List
        Route::get('admin/download/merit_list/{array}',[MeritListPdfController::class,'download_pdf'])->name('admin_download_merit_list');
    });
    
    Route::group(['middleware' => ['permission:View Student Payment Reciept']], function () {
        // View Fee Recipet
        Route::get('view/fee_recipet/{id}',[FeeRecipetPdfController::class,'view_pdf'])->name('view_fee_recipet');
    });

    Route::group(['middleware' => ['permission:Download Student Payment Reciept']], function () {
        // Download Fee Recipet
        Route::get('download/fee_recipet/{id}',[FeeRecipetPdfController::class,'download_pdf'])->name('download_fee_recipet');
    });

    Route::group(['middleware' => ['permission:View Student Fine Reciept']], function () {
        // View Fine Recipet
        Route::get('view/fine_recipet/{id}',[FineRecipetPdfController::class,'view_pdf'])->name('view_fine_recipet');
    });

    Route::group(['middleware' => ['permission:Download Student Fine Reciept']], function () {
        // Download Fine Recipet
        Route::get('download/fine_recipet/{id}',[FineRecipetPdfController::class,'download_pdf'])->name('download_fine_recipet');
    });

    Route::group(['middleware' => ['permission:View Student Night Out Form']], function () {
        // View Night Out Form
        Route::get('view/night_out_form/{id}',[NightOutFormPdfController::class,'view_pdf'])->name('view_night_out_form');
    });

    Route::group(['middleware' => ['permission:Download Student Night Out Form']], function () {
        // Download Night Out Form
        Route::get('download/night_out_form/{id}',[NightOutFormPdfController::class,'download_pdf'])->name('download_night_out_form');
    });

    Route::group(['middleware' => ['permission:Access Attendance']], function () {
        // All Attendance
        Route::get('all/attendance',AllAttendance::class)->name('all_attendance');
    });
    
    Route::group(['middleware' => ['permission:View Attendance']], function () {
        // View Attendance
        Route::get('admin/view/attendance/{array}',[AttendancePdfController::class,'view_pdf'])->name('admin_view_attendance');
    });
    
    Route::group(['middleware' => ['permission:Download Attendance']], function () {
        // Download Attendance
        Route::get('admin/download/attendance{array}',[AttendancePdfController::class,'download_pdf'])->name('admin_download_attendance');
    });
    
    Route::group(['middleware' => ['permission:View Attendance Report']], function () {
        // View Attendance Report
        Route::get('admin/view/attendance/report/{array}',[AttendanceReportPdfController::class,'view_pdf'])->name('admin_view_attendance_report');
    });
    
    Route::group(['middleware' => ['permission:Download Attendance Report']], function () {
        // Download Attendance Report
        Route::get('admin/download/report/attendance{array}',[AttendanceReportPdfController::class,'download_pdf'])->name('admin_download_attendance_report');
    });
    
    Route::group(['middleware' => ['permission:View Student Report']], function () {
        // View Student Report
        Route::get('admin/view/student/report/{array}',[StudentReportPdfController::class,'view_pdf'])->name('admin_view_student_report');
    });
    
    Route::group(['middleware' => ['permission:Download Student Report']], function () {
        // Download Student Report
        Route::get('admin/download/report/student/{array}',[StudentReportPdfController::class,'download_pdf'])->name('admin_download_student_report');
    });

    Route::group(['middleware' => ['permission:View Room Report']], function () {
        // View Room Report
        Route::get('admin/view/room/report/{array}',[RoomReportPdfController::class,'view_pdf'])->name('admin_view_room_report');
    });
    
    Route::group(['middleware' => ['permission:Download Room Report']], function () {
        // Download Room Report
        Route::get('admin/download/report/room/{array}',[RoomReportPdfController::class,'download_pdf'])->name('admin_download_room_report');
    });
    
    Route::group(['middleware' => ['permission:View Payment Report']], function () {
        // View Payment Report
        Route::get('admin/view/payment/report/{array}',[PaymentReportPdfController::class,'view_pdf'])->name('admin_view_payment_report');
    });
    
    Route::group(['middleware' => ['permission:Download Payment Report']], function () {
        // Download Payment Report
        Route::get('admin/download/report/payment/{array}',[PaymentReportPdfController::class,'download_pdf'])->name('admin_download_payment_report');
    });
    
    Route::group(['middleware' => ['permission:View Allocation Report']], function () {
        // View Allocation Report
        Route::get('admin/view/allocation/report/{array}/{bed_status?}',[AllocationReportPdfController::class,'view_pdf'])->name('admin_view_allocation_report');
    });
    
    Route::group(['middleware' => ['permission:Download Allocation Report']], function () {
        // Download Allocation Report
        Route::get('admin/download/report/allocation/{array}/{bed_status?}',[AllocationReportPdfController::class,'download_pdf'])->name('admin_download_allocation_report');
    });

    Route::group(['middleware' => ['permission:Access RFID']], function () {
        // Assgin RFID
        Route::get('admin/assgin/rfid',AssignRFID::class )->name('admin_assgin_rfid');
    });

});




require __DIR__.'/student_auth.php';
require __DIR__.'/admin_auth.php';
