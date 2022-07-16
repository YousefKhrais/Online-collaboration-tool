<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TeacherCoursesController extends Controller
{

    public function index()
    {

        $teacher = Teacher::with('courses')
            ->select('*')
            ->where('id', auth("teacher")->user()->id)
            ->first();

        return view("Teacher/course/index",
           [ 'teacher' => $teacher,
            'categories' => Category::select('*')->get()
           ]
        );

    }

    public function view($id)
    {
        $course = Course::with('students')
            ->with("teacher")
            ->with("category")
            ->select('*')
            ->where('id', $id)
            ->first();

        $teacher = Teacher::where('id', auth("teacher")->user()->id)->first();

        if ($course == null)
            return redirect()->back()->withErrors(['Course does not exists.']);

        if ($course->teacher->id != $teacher->id)
            return redirect()->back()->withErrors(['You are not the teacher of this course']);

        return view('Teacher.course.view', array(
            'course' => $course,
            'teacher' => $teacher,
            'students' => Student::select('*')->get()
        ));
    }

    public function enroll(Request $request, $id)
    {
        $students = $request->input('student_id');

        if (!Course::where([['id', '=', $id]])->exists())
            return redirect()->back()->withErrors(['Course does not exists.']);

        $course = Course::with('students')
            ->select('*')
            ->where('id', $id)
            ->first();

        foreach ($students as $student_id) {
            if (!Student::where([['id', '=', $student_id]])->exists())
                return redirect()->back()->withErrors(['Selected student does not exists.']);

            if ($course->students->contains($student_id))
                return redirect()->back()->withErrors(['Failed to enrolled student (Student is already enrolled in this course)']);

            $course->students()->attach($student_id);
        }

        Session::flash('alert-success', "Successfully enrolled students");
        return redirect()->back();
    }
}
