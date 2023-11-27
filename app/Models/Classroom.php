<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'name',
        'layout',
        'professor_id',
        'max_students',
        'started_at',
        'ended_at'
    ];
}
