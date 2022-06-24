<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{

    public function index(){
        return view("Courses/Courses");
    }

    public function getCourse(){
        $columns= ["course.*","teacher.name","teacher.profile_image"];
        $courses = course::join("teacher","teacher.id","=","course.teacher_id")
            ->get($columns);

        return json_encode(["courses"=>$courses]);
    }

    public function show(course $course){
        return view("Courses/CourseDetails",["course_id"=>$course->id]);
    }

    public function getTeacherImage(Request $request){
        $course = course::find($request->input("course_id"));
        $teacher = $course->getTeacher();
        return json_encode(["image"=>$teacher->profile_image]);
    }

    public function getCourseDetails(Request $request){
        $course_id = $request->input("course_id");
        $columns = [ "course.*","teacher.name","teacher.profile_image", "categories.name As category_name "];

        $course = course::join("teacher","teacher.id","=","course.teacher_id")
            ->join("categories","categories.id","=","course.category_id")
            ->where("course.id",$course_id)
            ->get($columns)->first();

        return jsoN_encode(["course"=>$course]);
    }

}
