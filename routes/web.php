<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//---student info route
Route::get('/student-info/add',[StudentController::class,'add'])->name('add.info');
Route::post('/student-info/insert',[StudentController::class,'insert']);
Route::get('/student-info/view',[StudentController::class,'view'])->name('view.info');
Route::get('/student-info/edit/{id}',[StudentController::class,'edit'])->name('edit.info');
Route::post('/student-info/update',[StudentController::class,'update']);
Route::get('/student-info/delete/{id}',[StudentController::class,'destroy'])->name('delete.info');
Route::get('/student-info/status/{id}',[StudentController::class,'status_change'])->name('status.change');
