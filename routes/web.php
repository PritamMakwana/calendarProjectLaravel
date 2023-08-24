<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfessionalController;

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



Route::controller(CustomAuthController::class)->group(function () {
    //login
    Route::get('login', 'login')->middleware('AlreadyLoggedIn');
    Route::post('login', 'loginUser')->name('login-user');
    //logout
    Route::get('logout', 'logout');
});

Route::middleware(['isLoggedIn'])->group(function () {

    Route::get('/', [CalendarController::class,'dashboard']);

    Route::get('cal',[CalendarController::class,'index']);

    Route::post('cal-add', [CalendarController::class,'calAdd'])->name('cal-add');

    // Professional

    Route::get('professional',[ProfessionalController::class,'index']);
    Route::get('professional-add',[ProfessionalController::class,'professionalAdd']);

    Route::post('professional-add',[ProfessionalController::class,'professionalAddData']);

    Route::get('{id}/delete',[ProfessionalController::class,'destroy']);

    // Route::post('changeStatus/{Id}',[ProfessionalController::class,'changeStatus'])->name('changeStatus');


    Route::put('/change/{id}/status', [ProfessionalController::class, 'changeStatus'])->name('change.status');


    //pdf download
    Route::get('{id}/pdf',[ProfessionalController::class,'getPdf']);




});
