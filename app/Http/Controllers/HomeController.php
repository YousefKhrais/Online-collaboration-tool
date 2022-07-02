<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Home/Index', array(
            'courses_count' => count(Course::select('*')->get()),
            'teachers_count' => count(Teacher::select('*')->get()),
            'students_count' => count(Student::select('*')->get()),
            'categories_count' => count(Category::select('*')->get())
        ));
    }

    public function about()
    {
        return view('Home/About', array(
            'courses_count' => count(Course::select('*')->get()),
            'teachers_count' => count(Teacher::select('*')->get()),
            'students_count' => count(Student::select('*')->get()),
            'categories_count' => count(Category::select('*')->get())
        ));
    }

    public function pricing()
    {
        return view("Home/Pricing");
    }

    public function contact()
    {
        return view("Home/Contact");
    }
}
