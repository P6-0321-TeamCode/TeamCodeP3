<?php

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

Route::get('/', function () { return view('welcome');});
//Route::get('/ver/{id}', 'App\Http\Controllers\ProfileController@index');

Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
//Route::get('/student', 'App\Http\Controllers\StudentController@showCourses');
Route::get('profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');



Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/student', [App\Http\Controllers\StudentController::class, 'index'])->name('student');

Route::post('/student', [App\Http\Controllers\StudentController::class, 'store'])->name('student');


Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'index'])->name('teacher');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

Route::post('/admin', [App\Http\Controllers\AdminController::class, 'store'])->name('admin');


