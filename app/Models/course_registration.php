<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_registration extends Model
{
    use HasFactory;
    protected $table = "course_registration";
    protected $fillable = [ "course_id",
        "teacher_id",
        "student_ID"];

}
