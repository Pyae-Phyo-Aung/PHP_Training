<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\MajorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
 
Route::get('/',[Controller::class,'index'])->name('home');
//major route lists 
Route::get('/major',[MajorController::class,'index'])->name('major.index');
Route::post('/major/create',[MajorController::class,'store'])->name('major.create');
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

//Route::get('/', 'ExcelController@index');
Route::get('/student-import',[ExcelController::class,'studentImport'])->name('student.import');
Route::post('/import',[ExcelController::class,'importData'])->name('import');
Route::get('/export',[ExcelController::class,'exportData'])->name('export');