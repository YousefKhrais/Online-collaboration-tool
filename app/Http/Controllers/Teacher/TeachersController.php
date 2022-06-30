<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\course_registration;
use App\Models\teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{

    public function index(){
        $teachers = teacher::all();
        return view("Teacher/Trainers",['teachers'=>$teachers]);
    }

    public function getTeacherCourses(Request $request){

        $teacher_id = auth("teacher")->user()->id;

        $courses =teacher::find($teacher_id)->getCourses();

        return view("Teacher/Courses",[
            "courses"=>$courses
        ]);

    }

}
