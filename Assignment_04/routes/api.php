<?php

use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\MajorController;
use App\Http\Controllers\API\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/students',[HomeController::class,'student'])->name('students');
Route::get('/majors',[HomeController::class,'major'])->name('majors');
//major route lists 
Route::get('/major',[MajorController::class,'index'])->name('major.index');
Route::post('/major/store',[MajorController::class,'store'])->name('major.store');
Route::get('/major/edit/{id}',[MajorController::class,'edit'])->name('major.edit');
Route::put('/major/update/{id}',[MajorController::class,'update'])->name('major.update');
Route::delete('/major/destroy/{id}',[MajorController::class,'destroy'])->name('major.destroy');
//student routs list 
Route::get('/student', [StudentController::class,'index'])->name('student.index');
Route::get('/student/create', [StudentController::class,'create'])->name('student.create');
Route::post('/student/store', [StudentController::class,'store'])->name('student.store');
Route::get('/student/show/{id}', [StudentController::class,'show'])->name('student.show');
Route::get('/student/edit/{id}', [StudentController::class,'edit'])->name('student.edit');
Route::put('/student/update/{id}', [StudentController::class,'update'])->name('student.update');
Route::delete('/student/destroy/{id}', [StudentController::class,'destroy'])->name('student.destroy');
