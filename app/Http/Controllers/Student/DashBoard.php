<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoard extends Controller
{
    public function Index(){
        return view("Student/DashBoard");
    }
}
