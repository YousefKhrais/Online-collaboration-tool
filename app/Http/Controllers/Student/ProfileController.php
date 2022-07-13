<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StudentProfileUpdateRequest;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function update(StudentProfileUpdateRequest $request)
    {
        $result = Student::where('id', auth("student")->user()->id)->update([
//            'email' => $request['email'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone_number' => $request['phone_number'],
            'date_of_birth' => $request['date_of_birth'],
            'gender' => $request['gender'],
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
