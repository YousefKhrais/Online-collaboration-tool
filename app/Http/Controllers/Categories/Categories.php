<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class Categories extends Controller
{
    public function index(){
        $data = category::all();
        return view("Student/Categories")->with("categories",$data);
    }
    public function courses(Category $category){
        $coures = $category->getCourses();
        return view("Categories/Courses",["courses"=>$coures]);
    }
}
