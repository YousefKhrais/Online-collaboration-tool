<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Kreait\Firebase\Contract\Auth;

class RegisterController extends Controller
{

    public function index(){
        return view("Student/RegisterPage");
    }

    public function register(Request $request){
        $rules = ["name"=>"required",
            "password"=>"required",
            "email"=>"required"
        ];

        $result  = $request->validate($rules);
        if(!$result){
            return back()->withErrors();
        }

        $password = Hash::make($result["password"]);

        $result["password"] = $password;
        $result["remember_token"] =Str::random(10);
        $student = student::create($result);

        if(!$student){
            return "unKnows Error";
        }

        return redirect("/student");
    }

}
