<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//courses api
Route::get('/courses/getCourses', [
    \App\Http\Controllers\Courses\CoursesController::class,"getCourse"
]);

Route::get('/courses/getTeacherImage', [
    \App\Http\Controllers\Courses\CoursesController::class,"getTeacherImage"
]);

Route::get('/courses/getCourseDetails', [
    \App\Http\Controllers\Courses\CoursesController::class,"getCourseDetails"
]);

//student api

Route::get("student/fetchStudent",[
    \App\Http\Controllers\Student\ProfileController::class,"fetchStudent"
]);

Route::get("student/fetchStudentSocialMedia",[
    \App\Http\Controllers\Student\ProfileController::class,"fetchStudentSocialMedia"
]);

//teacher api
Route::get("teacher/fetchTeacher",[
    \App\Http\Controllers\Teacher\TeacherProfileController::class,"fetchTeacher"
]);


Route::get("teacher/fetchTeacherSocialMedia",[
    \App\Http\Controllers\Teacher\TeacherProfileController::class,"fetchTeacherSocialMedia"
]);

