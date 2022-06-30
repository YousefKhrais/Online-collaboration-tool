<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\course;
use App\Models\course_registration;
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
    //show for all , and Entroll or students
    public function show(course $course){
        $is_registered =false;

        if(auth("student")->check()){
            $record_data = [
                "course_id"=>$course->id,
                "teacher_id"=>$course->getTeacher()->id,
                "student_ID"=>auth("student")->user()->id,
            ];

            $is_registered = $this->isExist($record_data);

        }

        return view("Courses/CourseDetails",["course_id"=>$course->id,
        "is_registered"=>$is_registered
        ]);
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

    public function entroll(Request $request){
        $rules=[
          "course_id"=>["required"],
          "teacher_id"=>["required"]
        ];
        $result =$request->validate($rules);

        if(!$result){
            return "error";
        }

        $result["student_ID"] = auth("student")->user()->id;

        if($this->isExist($result)){
            return "you are already registered to this course";
        }

        $registration_record = course_registration::create(
            $result
        );

        if(!$registration_record){
            return "unknown Error";
        }

        return redirect()->route("courseDetails",["course"=>$result["course_id"]]);
    }

    private  function isExist($record_data){
        $record = course_registration::query()->where("student_ID",$record_data["student_ID"])
            ->where("course_id",$record_data["course_id"])
            ->where("teacher_id",$record_data["teacher_id"])->first();

        //return true if recored exist(not null)
       return !is_null($record);
    }

}

