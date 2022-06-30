<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Database\Seeders\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function __construct(){

    }

    public function index(){
        return view("Student/LoginPage");
    }

    public function login(Request $request){
        $rules = [
          "email"=>"required",
        "password"=>"required"
        ];
        $result = $request->validate($rules);

        $student = \App\Models\student::query()->where("email",$result["email"])->first();

        if(!$student){
            return "user not found";
        }

        if(!Hash::check($request->input("password"),$student->password)){
            return "password is  wrong!!";
        }

        Auth::guard("student")->login($student);

        return \redirect()->route("home");
    }

    public function logout(){
        \auth("student")->logout();
        return \redirect()->route("home");
    }

}
