<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\course;
use App\Models\course_registration;
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

    //show for all , and Entroll or students
    public function show(course $course)
    {
        $is_registered = false;

        if (auth("student")->check()) {
            $record_data = [
                "course_id" => $course->id,
                "teacher_id" => $course->getTeacher()->id,
                "student_ID" => auth("student")->user()->id,
            ];

            $is_registered = $this->isExist($record_data);
        }

        return view("Courses/CourseDetails", [
            "course_id" => $course->id,
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
            "course_id" => ["required"],
            "teacher_id" => ["required"]
        ];
        $result = $request->validate($rules);

        if (!$result) {
            return "error";
        }

        $result["student_ID"] = auth("student")->user()->id;

        if ($this->isExist($result)) {
            return "you are already registered to this course";
        }

        $registration_record = course_registration::create(
            $result
        );

        if (!$registration_record) {
            return "unknown Error";
        }

        return redirect()->route("courseDetails", ["course" => $result["course_id"]]);
    }

    private function isExist($record_data)
    {
        $record = course_registration::query()->where("student_ID", $record_data["student_ID"])
            ->where("course_id", $record_data["course_id"])
            ->where("teacher_id", $record_data["teacher_id"])->first();

        //return true if recored exist(not null)
        return !is_null($record);
    }

}

