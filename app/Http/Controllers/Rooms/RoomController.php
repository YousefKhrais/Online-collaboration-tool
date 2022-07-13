<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\teacher;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function index(Request $request){
        $room_id = $request->post("course_id");
        return view("ChatRooms/Room" , ["roomID"=> $room_id]);
    }

    public function studentLobby(Request $request){

        $course_record = [
            "course_id"=>$request->input("course_id"),
            "teacher_id"=>$request->input("teacher_id"),
            "student_id"=>auth("student")->user()->id
        ];

        return view("ChatRooms/StudentLobby",[
            "course_record"=>$course_record
        ]);

    }

    public function teacherLobby(Request $request){
        return $request->input("course_id");
    }

    public function studentJoinRoom(Request $request){
        $room_id = $request->post("course_id");
        return $room_id;
        $student = Student::find(auth("student")->user()->id);
//        return $student;
        return view("ChatRooms/ChatRoom" ,
            ["roomID"=> $room_id ,
              "name"=>$student->getFullName()
            ]);
    }

}
