<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{

    public function index()
    {
        $teachers = Teacher::all();
        return view("Teacher/Trainers", ['teachers' => $teachers]);
    }

}
