<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\TeacherProfileUpdateRequest;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherProfileController extends Controller
{
    public function index(Request $request)
    {
        $teacher = Teacher::where('id', auth("teacher")->user()->id)->first();
        return view("Teacher.profile.index", ["teacher" => $teacher]);
    }

    public function edit(Request $request)
    {
        $teacher = Teacher::where('id', auth("teacher")->user()->id)->first();
        return view("Teacher.profile.edit", ["teacher" => $teacher]);
    }

    public function update(TeacherProfileUpdateRequest $request)
    {
        $result = Teacher::where('id', auth("teacher")->user()->id)->update([
//            'email' => $request['email'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone_number' => $request['phone_number'],
            'date_of_birth' => $request['date_of_birth'],
            'gender' => $request['gender'],
            'address' => $request['address'],
            'description' => $request['description'],
            'github' => $request['github'],
            'linkedin' => $request['linkedin'],
            'stack_overflow' => $request['stack_overflow']
        ]);

        if ($result)
            Session::flash('alert-success', 'Successfully updated profile');
        else
            Session::flash('alert-danger', 'Failed to update profile');

        return redirect()->back();
    }

    public function fetchTeacher(Request $request){
        $teacher_id = $request->get("teacher_id");
        $teacher = Teacher::find($teacher_id);
        $data = json_encode([
           "teacher"=>$teacher
        ]);
        return $data;
    }

    public function fetchTeacherSocialMedia(Request $request){
        $teacher  = Teacher::find($request->input("teacher_id"));

        $socialMedia = [
            "LinkedIn"=>$teacher->github,
            "Twitter"=>$teacher->twitter,
            "Instagram"=>$teacher->instagram,
            "Facebook"=>$teacher->facebook
        ];

        return json_encode(["social_media"=>$socialMedia]);
    }

    public function updateTeacher(Request $request){

        $rules =[
            "name"=>"required",
            "email"=>"required"
        ];

        $teacher_id = auth("teacher")->user()->id;
        $result = $request->validate($rules);

        $teacher = Teacher::find($teacher_id);

        $teacher->name=$result["name"];

        $teacher->email=$result["email"];
//        $teacher->description=(isset($result["description"])) ? $result["description"] : null ;
//         $teacher->facebook=(isset($result["facebook"])) ? $result["facebook"] : null ;
//         $student->instagram=(isset($result["instagram"])) ? $result["instagram"] : null ;
//         $student->github=(isset($result["github"])) ? $result["github"] : null ;
//         $student->twitter=(isset($result["twitter"])) ? $result["twitter"] : null ;
        $teacher->phone=(isset($result["phone"])) ? $result["phone"] : null ;
        $teacher->mobile=(isset($result["mobile"])) ? $result["mobile"] : null ;
        $teacher->save();

        return $teacher;
    }

    public function editProfile(Request $request){
        $teacher_id = auth("teacher")->user()->id;
        return view("Teacher/EditProfile",["teacher_id"=>$teacher_id]);
    }

}
