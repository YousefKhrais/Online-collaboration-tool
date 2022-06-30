<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

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

////end home routes
//Route::group(['prefix' => 'admin'], function () {
//    Voyager::routes();
//});

//Auth::routes();

//Student
Route::get('/student/', [App\Http\Controllers\Student\DashBoard::class, 'index'])->name('studentDashboard');
Route::get('/categories', [App\Http\Controllers\Categories\Categories::class, 'index'])->name('categories');
Route::get("/student/session",[\App\Http\Controllers\Student\SessionController::class,"index"]);

Route::get("/categories/{category}",[App\Http\Controllers\Categories\Categories::class, 'courses'])->name("categoryCourses");

Route::get("/student/profile",[\App\Http\Controllers\Student\ProfileController::class,"index"])
    ->name("StudentProfile")->middleware("auth:student");

Route::get("/student/profile/edit",[\App\Http\Controllers\Student\ProfileController::class,"editProfilePage"])
    ->name("StudentEditProfile")->middleware("auth:student");

Route::post("/student/profile/edit",[\App\Http\Controllers\Student\ProfileController::class,"updateStudent"])
    ->name("updateStudent")->middleware("auth:student");

Route::get("/student/login",[\App\Http\Controllers\Student\LoginController::class,"index"])->name("studentLogin");
Route::post("/student/login",[\App\Http\Controllers\Student\LoginController::class,"login"])->name("studentLogin");

Route::get("/student/register",[\App\Http\Controllers\Student\RegisterController::class,"index"])->name("StudentRegister");
Route::post("/student/register",[\App\Http\Controllers\Student\RegisterController::class,"register"])->name("StudentRegister");

Route::get("/student/logout",[\App\Http\Controllers\Student\LoginController::class,"logout"])->name("studentLogout");

//Courses Routes
Route::get('/courses', [\App\Http\Controllers\Courses\CoursesController::class,"index"])->name("courses");
Route::get('/courses/{course}', [\App\Http\Controllers\Courses\CoursesController::class,"show"])->name("courseDetails");

Route::post("courses/entrollCourse",[
    \App\Http\Controllers\Courses\CoursesController::class,"entroll"
])->name("entrollCourse")->middleware("auth:student");

//teacher routes
Route::get("teacher/login",[\App\Http\Controllers\Teacher\TeacherLoginController::class,"index"])->name("teacherLogin");
Route::post("teacher/login",[\App\Http\Controllers\Teacher\TeacherLoginController::class,"login"])
    ->name("teacherLogin");

Route::get("teacher/logout",[\App\Http\Controllers\Teacher\TeacherLoginController::class,"logout"])->name("teacherLogOut");

Route::get("teacher/profile",[\App\Http\Controllers\Teacher\TeacherProfileController::class,"index"])
    ->name("teacherProfile")->middleware("auth:teacher");

Route::get("/teacher/profile/edit",[\App\Http\Controllers\Teacher\TeacherProfileController::class,"editProfile"])
    ->name("editTeacherProfile")->middleware("auth:teacher");

Route::post("/teacher/profile/edit",[\App\Http\Controllers\Teacher\TeacherProfileController::class,"updateTeacher"])
    ->name("updateTeacher")->middleware("auth:teacher");

Route::get("teacher/getCourses",[
    \App\Http\Controllers\Teacher\TeachersController::class,"getTeacherCourses"
])->name("teacher_courses")->middleware("auth:teacher");

//room routes
Route::get("room/student",[\App\Http\Controllers\Rooms\RoomController::class,"studentLobby"])
    ->name("studentLobby")->middleware("auth:student");

Route::get("room/teacher",[\App\Http\Controllers\Rooms\RoomController::class,"teacherLobby"])
    ->name("teacherLobby")->middleware("auth:teacher");

Route::post("room/student/joinRoom",[
    \App\Http\Controllers\Rooms\RoomController::class,"studentJoinRoom"
])->name("studentJoinRoom")->middleware("auth:student");
