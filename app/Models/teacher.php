<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    protected $table="teacher";
    protected $fillable=[
        'mame','description','interests'
    ];

    protected $casts=[
        'interests'=>'array'
    ];

}
