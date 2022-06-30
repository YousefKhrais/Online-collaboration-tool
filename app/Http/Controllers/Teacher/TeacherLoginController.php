<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherLoginController extends Controller
{

    public function index(){
        return view("Teacher/LoginPage");
    }

    public function login(Request $request){
        $rules = [
            "email"=>["required"],
            "password"=>["required"],
        ];

        $result = $request->validate($rules);
        if(!$request){
            return back()->withErrors();
        }

        $teacher = teacher::query()->where("email",$result["email"])->first();

        if(!$teacher){
            return "teacher not found";
        }

        if(!Hash::check($result["password"],$teacher->password)){
            return "password wrong";
        }

        Auth::guard("teacher")->login($teacher);

        return redirect()->route("home");
    }
    public function logout(){
        \auth("teacher")->logout();
        return redirect()->route("home");

    }

}
