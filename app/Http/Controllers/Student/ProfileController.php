<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index(Request $request)
    {
        $student = Student::where('id', auth("student")->user()->id)->first();
        return view("Student.profile.index", ["student" => $student]);
    }


    public function edit(Request $request)
    {
        $student = Student::where('id', auth("student")->user()->id)->first();
        return view("Student.profile.edit", ["student" => $student]);
    }

    public function update(Request $request)
    {

        $rules = [
            "name" => "required",
            "email" => "required"
        ];

        $student_id = auth("student")->user()->id;
        $result = $request->validate($rules);

        $student = student::find($student_id);

        $student->name = $result["name"];
        $student->email = $result["email"];
//         $student->description=(isset($result["description"])) ? $result["description"] : null ;
//         $student->facebook=(isset($result["facebook"])) ? $result["facebook"] : null ;
//         $student->instagram=(isset($result["instagram"])) ? $result["instagram"] : null ;
//         $student->github=(isset($result["github"])) ? $result["github"] : null ;
//         $student->twitter=(isset($result["twitter"])) ? $result["twitter"] : null ;
        $student->phone = (isset($result["phone"])) ? $result["phone"] : null;
        $student->mobile = (isset($result["mobile"])) ? $result["mobile"] : null;
        $student->save();

        return $student;
    }


    public function fetchStudent(Request $request)
    {
        $student = student::find($request->input("student_id"));
        $data = json_encode(["student" => $student]);
        return $data;
    }

    public function fetchStudentSocialMedia(Request $request)
    {
        $student = student::find($request->input("student_id"));

        $socialMedia = [
            "Github" => $student->github,
            "Twitter" => $student->twitter,
            "Instagram" => $student->instagram,
            "Facebook" => $student->facebook
        ];

        return json_encode(["social_media" => $socialMedia]);
    }
}
