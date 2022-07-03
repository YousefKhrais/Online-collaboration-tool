<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view("Teacher/Trainers", ['teachers' => $teachers]);
    }

    public function getTeacherCourses(Request $request)
    {
        $teacher_id = auth("teacher")->user()->id;

        $teacher = Teacher::with('courses')
            ->select('*')
            ->where('id', $teacher_id)
            ->first();

        return view("Teacher/Courses", ["teacher" => $teacher]);
    }
}
