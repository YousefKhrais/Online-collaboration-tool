<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{

    public function index(){
        $teachers = teacher::all();
        return view("Teacher/Trainers",['teachers'=>$teachers]);
    }

}
