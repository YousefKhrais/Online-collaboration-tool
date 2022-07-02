<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'courses_count'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function getCoursesCount()
    {
        return count($this->courses()->get());
    }
}
