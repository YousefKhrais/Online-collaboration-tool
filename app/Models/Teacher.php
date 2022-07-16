<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $guarded = "teacher";

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'phone_number',
        'date_of_birth',
        'status',
        'gender',
        'address',
        'image_link',
        'stack_overflow',
        'linkedin',
        'github',
        'courses_count',
        'requests_count',
        'description',
        'interests',
        'remember_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts=[
        'interests'=>'array'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function getGender()
    {
        if ($this->gender) {
            return "Female";
        } else {
            return "Male";
        }
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getCoursesCount()
    {
        return count($this->courses()->get());
    }
}
