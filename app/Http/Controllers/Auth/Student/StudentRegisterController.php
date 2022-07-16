<?php

namespace App\Http\Controllers\Auth\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StudentRegistrationRequest;
use App\Models\student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use function back;
use function redirect;
use function view;

class StudentRegisterController extends Controller
{
    public function index()
    {
        return view("auth.student.register");
    }

    public function register(StudentRegistrationRequest $request)
    {
        $request->register();
        return redirect()->route("home");
    }
}
