<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\CourseUpdateRequest;
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

    public function unenroll(Request $request, $id)
    {
        $studentId = $request['student_id'];

        if (!Course::where([['id', '=', $id]])->exists())
            return redirect()->back()->withErrors(['Course does not exists.']);

        if (!Student::where([['id', '=', $studentId]])->exists())
            return redirect()->back()->withErrors(['Selected student does not exists.']);

        $course = Course::with('students')
            ->select('*')
            ->where('id', $id)
            ->first();

        if (!$course->students->contains($studentId))
            return redirect()->back()->withErrors(['Failed to unenroll student (Student is not enrolled in this course)']);

        $course->students()->detach($studentId);
        Session::flash('alert-success', 'Successfully unenroll student');

        return redirect()->back();
    }

    public function courseSettings($id)
    {
        $course = Course::with('students')
            ->select('*')
            ->where('id', $id)
            ->first();

        if ($course == null)
            return redirect()->back()->withErrors(['Course does not exists.']);

        return view('Teacher.course.settings', array(
            'course' => $course,
            'teachers' => Teacher::select('*')->get(),
            'categories' => Category::select('*')->get(),
            'students' => Student::select('*')->get()
        ));
    }

    public function update(CourseUpdateRequest $request, $id)
    {
        $description = $request['description'];
        $image_link = $request['image_link'];
        $schedule = $request['schedule'];
        $requirements = $request['requirements'];
        $syllabus = $request['syllabus'];
        $outline = $request['outline'];

        if (!Course::where([['id', '=', $id]])->exists())
            return redirect()->back()->withErrors(['Course does not exists.']);

        $result = Course::where('id', $id)->update([
            'description' => $description,
            'image_link' => $image_link,
            'schedule' => $schedule,
            'requirements' => $requirements,
            'syllabus' => $syllabus,
            'outline' => $outline
        ]);

        if ($result)
            Session::flash('alert-success', 'Successfully updated course');
        else
            Session::flash('alert-danger', 'Failed to update course');

        return redirect()->back();
    }
}
