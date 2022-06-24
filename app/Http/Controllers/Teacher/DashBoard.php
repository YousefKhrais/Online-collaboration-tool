<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoard extends Controller
{
    public function Index(){
        return view("Teacher/DashBoard");
    }

}
