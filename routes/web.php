<?php

use Illuminate\Support\Facades\Route;

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


Route::controller(App\Http\Controllers\StudentController::class)->group(function(){
    Route::get('/student','index');
    Route::get('/student/create','create');
    Route::post('/student/store','store');
    Route::get('student/{id}/delete','destroy');
   Route::post('/student','filter')->name('student.filter');
    
});
// Route::delete('/student/{id}',[App\Http\Controllers\StudentController::class,'deletest'])->name('student.delete');