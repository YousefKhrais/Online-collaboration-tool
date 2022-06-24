<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $table='course';

    public function getTeacher(){
        return $this->hasOne(teacher::class,"id","category_id")->first();
    }

    public function getCategory(){
        return $this->hasOne(category::class,"id","category_id")->first();
    }
}
