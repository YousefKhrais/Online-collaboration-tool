<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\TeacherLoginRequest;
use function auth;
use function redirect;
use function view;

class TeacherLoginController extends Controller
{
    public function index()
    {
        return view("auth.teacher.login");
    }

    public function login(TeacherLoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect()->route("home");
    }

    public function logout()
    {
        auth("teacher")->logout();
        return redirect()->route("home");
    }
}
