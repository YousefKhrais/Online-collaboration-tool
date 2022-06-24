<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $fillable = ['name','description','num_of_courses'];

    public function getCourses(){
        return $this->hasMany(course::class,"category_id","id")->get();
    }

}
