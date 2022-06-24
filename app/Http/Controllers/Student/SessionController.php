<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function index(){
        return view("Student/LearnSession/OpenSession");
    }

}
