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

//home pages

Route::get('/', [\App\Http\Controllers\HomeController::class,"index"])->name("home");
Route::get('/about', [\App\Http\Controllers\HomeController::class,"about"])->name("about");
Route::get('/trainers', [\App\Http\Controllers\Teacher\TeachersController::class,"index"])->name("trainers");
Route::get('/pricing', [\App\Http\Controllers\HomeController::class,"pricing"])->name("pricing");
Route::get('/contact', [\App\Http\Controllers\HomeController::class,"contact"])->name("contact");


//end home routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

//Student
Route::get('/student/', [App\Http\Controllers\Student\DashBoard::class, 'index'])->name('studentDashboard');
Route::get('/categories', [App\Http\Controllers\Categories\Categories::class, 'index'])->name('categories');
Route::get("/student/session",[\App\Http\Controllers\Student\SessionController::class,"index"]);

Route::get("room",[\App\Http\Controllers\Rooms\RoomController::class,"index"])->name("learningRoom");

Route::get("/categories/{category}",[App\Http\Controllers\Categories\Categories::class, 'courses'])->name("categoryCourses");

//Courses Routes
Route::get('/courses', [\App\Http\Controllers\Courses\CoursesController::class,"index"])->name("courses");
Route::get('/courses/{course}', [\App\Http\Controllers\Courses\CoursesController::class,"show"])->name("courseDetails");

