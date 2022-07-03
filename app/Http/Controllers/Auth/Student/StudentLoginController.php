<?php

namespace App\Http\Controllers\Auth\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StudentLoginRequest;
use function auth;
use function redirect;
use function view;

class StudentLoginController extends Controller
{
    public function index()
    {
        return view("auth.student.login");
    }

    public function login(StudentLoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect()->route("home");
    }

    public function logout()
    {
        auth("student")->logout();
        return redirect()->route("home");
    }
}
