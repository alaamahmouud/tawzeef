<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;

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

Route::get('/test', [App\Http\Controllers\TestController::class, 'test'])->name('test');

Route::get('/signin', [App\Http\Controllers\SigninController::class, 'signin'])->name('signin');

// Route::resource('levels', LevelController::class);

// Route::resource('departments', DepartmentController::class);

// Route::resource('subjects', SubjectController::class);
// Route::get('departments-of-level/{id}', [SubjectController::class, 'departmentOfLevel']);

// Route::resource('courses', CourseController::class);
// Route::get('subjects-of-department/{id}', [CourseController::class, 'subjectOfDepartment']);



