<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueueRequest extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'classroom_id',
        'student_id',
        'requested_at',
        'attendance_at',
        'ended_at'
    ];
}
