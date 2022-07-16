<?php

use App\Http\Controllers\Auth\Student\StudentRegisterController;
use App\Http\Controllers\Auth\Student\StudentLoginController;
use App\Http\Controllers\Auth\Teacher\TeacherLoginController;
use App\Http\Controllers\Categories\Categories;
use App\Http\Controllers\Courses\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Rooms\RoomController;
use App\Http\Controllers\Student\DashBoard;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\SessionController;
use App\Http\Controllers\Student\StudentCoursesController;
use App\Http\Controllers\Teacher\TeacherProfileController;
use App\Http\Controllers\Teacher\TeachersController;
use App\Http\Controllers\Teacher\TeacherCoursesController;
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

Route::get('/', [HomeController::class, "index"])->name("home");
Route::get('/about', [HomeController::class, "about"])->name("about");
Route::get('/trainers', [TeachersController::class, "index"])->name("trainers");
Route::get('/pricing', [HomeController::class, "pricing"])->name("pricing");
Route::get('/contact', [HomeController::class, "contact"])->name("contact");

Route::get("/xx", function () {
    return view("ChatRooms/ChatRoom");
});

Route::get("/d", function () {
    return view("ChatRooms/Drawing");
});

Route::get("/room", function () {
    return view("ChatRooms/Room");
});

Route::prefix('/student')->group(function () {
    Route::get('/', [DashBoard::class, 'index'])->name('studentDashboard');
    Route::get("/session", [SessionController::class, "index"]);

    Route::prefix('/courses')->group(function () {
        Route::get("/", [StudentCoursesController::class, "index"])->name("student.courses.index")->middleware("auth:student");
        Route::get("/view/{id}", [StudentCoursesController::class, "view"])->middleware("auth:student");
    });

    Route::prefix('/profile')->group(function () {
        Route::get("/", [ProfileController::class, "index"])->name("student.profile.index")->middleware("auth:student");
        Route::get("/edit", [ProfileController::class, "edit"])->name("student.profile.edit")->middleware("auth:student");
        Route::post("/update", [ProfileController::class, "update"])->name("student.profile.update")->middleware("auth:student");
    });

    Route::get("/login", [StudentLoginController::class, "index"])->name("studentLogin");
    Route::get("/logout", [StudentLoginController::class, "logout"])->name("studentLogout");
    Route::get("/register", [StudentRegisterController::class, "index"])->name("StudentRegister");
    Route::post("/login", [StudentLoginController::class, "login"])->name("studentLogin");
    Route::post("/register", [StudentRegisterController::class, "register"])->name("StudentRegister");

});

Route::prefix('/teacher')->group(function () {
    Route::prefix('/courses')->group(function () {
        Route::get("/", [TeacherCoursesController::class, "index"])->name("teacher_courses")->middleware("auth:teacher");
        Route::get("/view/{id}", [TeacherCoursesController::class, "view"])->middleware("auth:teacher")->name("showTeacherCourse");
        Route::post("/enroll/{id}", [TeacherCoursesController::class, "enroll"])->middleware("auth:teacher");
        Route::get('/settings/{id}', [TeacherCoursesController::class, 'courseSettings'])->middleware("auth:teacher");
        Route::post('/update/{id}', [TeacherCoursesController::class, 'update'])->middleware("auth:teacher");
        Route::post('/unenroll/{id}', [TeacherCoursesController::class, 'unenroll'])->middleware("auth:teacher");
    });

    Route::prefix('/profile')->group(function () {
        Route::get("/", [TeacherProfileController::class, "index"])->name("teacher.profile.index")->middleware("auth:teacher");
        Route::get("/edit", [TeacherProfileController::class, "edit"])->name("teacher.profile.edit")->middleware("auth:teacher");
        Route::post("/update", [TeacherProfileController::class, "update"])->name("teacher.profile.update")->middleware("auth:teacher");
    });

    Route::get("/login", [TeacherLoginController::class, "index"])->name("teacherLogin");
    Route::get("/logout", [TeacherLoginController::class, "logout"])->name("teacherLogOut");
    Route::post("/login", [TeacherLoginController::class, "login"])->name("teacherLogin");
});

Route::prefix('/categories')->group(function () {
    Route::get('/', [Categories::class, 'index'])->name('categories');
    Route::get("/{category}", [Categories::class, 'courses'])->name("categoryCourses");
});

Route::prefix('/courses')->group(function () {
    Route::get('/', [CoursesController::class, "index"])->name("courses");
    Route::get('/{id}', [CoursesController::class, "show"])->name("courseDetails");
    Route::post("/entrollCourse", [CoursesController::class, "entroll"])->name("entrollCourse")->middleware("auth:student");
});


Route::prefix('/room')->group(function () {
    Route::get("/student", [RoomController::class, "studentLobby"])->name("studentLobby")->middleware("auth:student");
    Route::get("/teacher", [RoomController::class, "teacherLobby"])->name("teacherLobby")->middleware("auth:teacher");
    Route::post("/student/joinRoom", [RoomController::class, "studentJoinRoom"])->name("studentJoinRoom")->middleware("auth:student");
    Route::post("/teacher/joinRoom", [RoomController::class, "teacherJoinRoom"])->name("teacherJoinRoom")->middleware("auth:teacher");
});

