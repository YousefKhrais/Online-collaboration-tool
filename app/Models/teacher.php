<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class teacher extends Authenticatable
{
    use HasFactory;
    protected $guarded = "teacher";
    protected $table="teacher";
    protected $fillable=[
        'mame','description','interests'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts=[
        'interests'=>'array'
    ];

    public function  getCourses(){
        return $this->hasMany(course::class,"teacher_id","id")
            ->get();
    }


}

