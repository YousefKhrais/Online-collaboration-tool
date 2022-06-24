<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Home/Index');
    }
    public function about(){
        return view("Home/About");
    }



    public function pricing(){
        return view("Home/Pricing");
    }
    public function contact(){
        return view("Home/Contact");
    }

}
