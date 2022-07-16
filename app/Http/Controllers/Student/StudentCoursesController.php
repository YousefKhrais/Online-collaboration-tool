<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class StudentCoursesController extends Controller
{

    public function index()
    {
        $student = Student::with('courses')
            ->select('*')
            ->where('id', auth("student")->user()->id)
            ->first();

        return view("Student.course.index", ["student" => $student]);
    }

    public function view($id)
    {
        $course = Course::with('students')
            ->with("teacher")
            ->with("category")
            ->select('*')
            ->where('id', $id)
            ->first();

        $student = Student::where('id', auth("student")->user()->id)->first();

        if ($course == null)
            return redirect()->back()->withErrors(['Course does not exists.']);

        if (!$course->students->contains($student->id))
            return redirect()->back()->withErrors(['You are not enrolled in this course']);

        return view('Student.course.view', array(
            'course' => $course,
            'student' => $student
        ));
    }

}
