<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsClassroom extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'classroom_id',
        'student_id',
        'position_seat',
    ];
}
