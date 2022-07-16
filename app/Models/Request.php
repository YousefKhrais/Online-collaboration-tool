<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'num_of_hours',
        'teacher_id',
        'category_id',
        'admin_note',
        'status'
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getStatus()
    {
        return match ($this->status) {
            0 => 'Open',
            1 => 'Rejected',
            2 => 'Accepted',
            default => 'Unknown',
        };
    }
}
