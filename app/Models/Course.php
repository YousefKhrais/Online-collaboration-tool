<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_link',
        'price',
        'num_of_hours',
        'students_count',
        'teacher_id',
        'category_id',
        'schedule',
        'requirements',
        'syllabus',
        'outline',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getStudentsCount()
    {
        return count($this->students()->get());
    }

    public function isStudentEnrolled($student_id)
    {
        return $this->students->contains($student_id);
    }
}
