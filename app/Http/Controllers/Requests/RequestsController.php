<?php

namespace App\Http\Controllers\Requests;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\CreateRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Request;
use Illuminate\Support\Facades\Session;

class RequestsController extends Controller
{
    public function index()
    {
        return view('dashboard.requests.index', array('requests' => Request::select('*')->get()));
    }

    public function store(CreateRequest $create_request)
    {
        $title = $create_request['title'];
        $description = $create_request['description'];
        $credit = $create_request['credit'];
        $price = $create_request['price'];
        $categoryId = $create_request['category_id'];

        if (Course::where([['title', '=', $title]])->exists())
            return redirect()->back()->withErrors(['Another Course with the same title already exists.']);

        if (!Category::where([['id', '=', $categoryId]])->exists())
            return redirect()->back()->withErrors(['Selected category does not exists.']);

        $request = Request::create([
            'title' => $title,
            'description' => $description,
            'num_of_hours' => $credit,
            'price' => $price,
            'teacher_id' => auth("teacher")->user()->id,
            'category_id' => $categoryId,
            'image_link' => "https://dashboard.programming-mentor.site/Home/assets/img/course-2.jpg",
            'status' => 0
        ]);

        $result = $request->save();

        if ($result)
            Session::flash('alert-success', 'Successfully created course request');
        else
            Session::flash('alert-danger', 'Failed to create course request');

        return redirect()->back();
    }
}
