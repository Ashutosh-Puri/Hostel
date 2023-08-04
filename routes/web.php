<?php

use App\Http\Livewire\ClassTable;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Bed\AllBed;
use App\Http\Livewire\Backend\Fee\AllFee;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Backend\Fine\AllFine;
use App\Http\Livewire\Backend\Room\AllRoom;
use App\Http\Livewire\Backend\Class\AllClass;
use App\Http\Livewire\Backend\Building\AllBuilding;
use App\Http\Livewire\Backend\Facility\AllFacility;
use App\Http\Livewire\Backend\AcademicYear\AllAcademicYear;




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



require __DIR__.'/auth.php';
