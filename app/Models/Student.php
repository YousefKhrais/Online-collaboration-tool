<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'phone_number',
        'date_of_birth',
        'status',
        'gender',
        'image_link',
        'description',
        'facebook',
        'twitter',
        'instagram',
        'github',
        'remember_token'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
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
