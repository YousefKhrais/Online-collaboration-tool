<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CoursesController extends Controller
{

    public function index()
    {
        $courses = Course::with('students')
            ->with('teacher')
            ->with('category')
            ->select('*')
            ->get();

        return view('Courses.Courses', array('courses' => $courses));
    }

    public function getCourse()
    {
        $columns = ["courses.*", "teachers.first_name", "teachers.last_name", "teachers.image_link"];
        $courses = Course::join("teachers", "teachers.id", "=", "courses.teacher_id")
            ->get($columns);

        return json_encode(["courses" => $courses]);
    }

    public function show($id)
    {
        $course = Course::with('students')
            ->with("teacher")
            ->with("category")
            ->select('*')
            ->where('id', $id)
            ->first();

        if ($course == null)
            return redirect()->back()->withErrors(['Course does not exists.']);

        $is_registered = false;
        if (auth("student")->check())
            $is_registered = $course->students->contains(auth("student")->user()->id);

        return view("Courses.CourseDetails", [
            "course" => $course,
            "is_registered" => $is_registered
        ]);

    }

    public function getTeacherImage(Request $request)
    {
        $course = Course::find($request->input("course_id"));
        $teacher = $course->getTeacher();
        return json_encode(["image" => $teacher->profile_image]);
    }

    public function getCourseDetails(Request $request)
    {
        $course_id = $request->input("course_id");
        $columns = ["courses.*", "teachers.first_name", "teachers.last_name", "teachers.image_link", "categories.title As category_name"];

        $course = Course::join("teachers", "teachers.id", "=", "courses.teacher_id")
            ->join("categories", "categories.id", "=", "courses.category_id")
            ->where("courses.id", $course_id)
            ->get($columns)->first();

        return jsoN_encode(["course" => $course]);
    }

    public function entroll(Request $request)
    {
        $rules = [
            "course_id" => ["required"]
        ];

        $result = $request->validate($rules);

        if (!$result)
            return redirect()->back()->withErrors(['Could not enroll you']);

        $result["student_ID"] = auth("student")->user()->id;

        if ($this->isExist($result))
            return redirect()->back()->withErrors(['you are already registered to this course.']);

        $course = Course::where('id', $result["course_id"])->first();
        $registration_record = $course->students()->attach($result["student_ID"]);

        return redirect()->back()->with('update_status', $registration_record);
    }

    private function isExist($record_data)
    {
        $course = Course::with('students')
            ->select('*')
            ->where('id', $record_data["course_id"])
            ->first();

        $is_registered = $course->students->contains(auth("student")->user()->id);
        return $is_registered;
    }

}
