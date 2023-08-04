<?php

use App\Http\Livewire\ClassTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;




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





require __DIR__.'/auth.php';
