<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CancerTypeController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\EnquiresController;
use App\Http\Controllers\DoctorLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::view('/index','admin/doctors/addDoctors');


//Cancer Type
// Route::get('cancerType/index',[CancerTypeController::class,'index'])->middleware('isLogged')->name('cancerType/index');
Route::get('cancerType/list',[CancerTypeController::class,'list'])->middleware('isLogged')->name('cancerType/list');
Route::get('cancerType/create',[CancerTypeController::class,'create'])->middleware('isLogged')->name('cancerType/create');
Route::post('cancerType/store',[CancerTypeController::class,'store'])->middleware('isLogged')->name('cancerType/store');
Route::get('cancerType/edit/{id}',[CancerTypeController::class,'edit'])->middleware('isLogged')->name('cancerType/edit');
Route::post('cancerType/update',[CancerTypeController::class,'update'])->middleware('isLogged')->name('cancerType/update');
Route::get('cancerType/destroy/{id}',[CancerTypeController::class,'destroy'])->middleware('isLogged')->name('cancerType/destroy');

//Doctors

// Route::get('Doctors/index',[DoctorsController::class,'index'])->middleware('isLogged')->name('Doctors/index');
Route::get('Doctors/list',[DoctorsController::class,'list'])->middleware('isLogged')->name('Doctors/list');
Route::get('Doctors/create',[DoctorsController::class,'create'])->middleware('isLogged')->name('Doctors/create');
Route::post('Doctors/store',[DoctorsController::class,'store'])->middleware('isLogged')->name('Doctors/store');
Route::get('Doctors/destroy/{id}',[DoctorsController::class,'destroy'])->middleware('isLogged')->name('Doctors/destroy');
Route::get('Doctors/edit/{id}',[DoctorsController::class,'edit'])->middleware('isLogged')->name('Doctors/edit');
Route::post('Doctors/update',[DoctorsController::class,'update'])->middleware('isLogged')->name('Doctors/update');


//admin login
Route::get('AdminLogin/dashboard',[AdminLoginController::class,'dashboard'])->middleware('isLogged')->name('AdminLogin/dashboard');
Route::get('AdminLogin/index',[AdminLoginController::class,'index'])->middleware('isNotLogged')->name('AdminLogin/index');
Route::post('AdminLogin/checkAuth',[AdminLoginController::class,'checkAuth'])->middleware('isNotLogged')->name('AdminLogin/checkAuth');
Route::get('AdminLogin/logout',[AdminLoginController::class,'logout'])->name('AdminLogin/logout');
// Route::get('AdminLogin/create',[AdminLoginController::class,'create'])->name('AdminLogin/create');


//public
Route::get('Public/index',[PublicController::class,'index'])->name('Public/index');
Route::post('Public/store',[PublicController::class,'store'])->name('Public/store');



//enquires
// Route::get('Enquiry/index',[EnquiresController::class,'index'])->middleware('isDoctorsLogged')->name('Enquiry/index');
Route::get('Enquiry/list',[EnquiresController::class,'list'])->middleware('isDoctorsLogged')->name('Enquiry/list');
Route::get('Enquiry/download/{id}',[EnquiresController::class,'download'])->middleware('isDoctorsLogged')->name('Enquiry/download');
Route::get('Enquiry/showPrescription/{id}',[EnquiresController::class,'showPrescription'])->middleware('isDoctorsLogged')->name('Enquiry/showPrescription');
Route::post('Enquiry/storePrescription',[EnquiresController::class,'storePrescription'])->middleware('isDoctorsLogged')->name('Enquiry/storePrescription');



//Doctors Auth
Route::get('Doctors/Login/index',[DoctorLoginController::class,'index'])->middleware('isDoctorsNotLogged')->name('Doctors/Login/index');
Route::post('Doctors/Login/checkAuth',[DoctorLoginController::class,'checkAuth'])->middleware('isDoctorsNotLogged')->name('Doctors/Login/checkAuth');
Route::get('Doctors/Login/Dashboard',[DoctorLoginController::class,'Dashboard'])->middleware('isDoctorsLogged')->name('Doctors/Login/Dashboard');
Route::get('Doctors/Login/logout',[DoctorLoginController::class,'logout'])->name('Doctors/Login/logout');




