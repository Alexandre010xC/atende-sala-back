<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

use App\Http\Controllers\UserController;
use App\Models\Classroom;
use App\Models\StudentsClassroom;
use App\Models\QueueRequest;
use App\Models\PoolCurrent;

class ClassroomController extends Controller
{
    public function createClassroom(Request $request)
    {
        $token_id = $request->token_id;
        if(!Auth::attempt(['token_id' => $token_id, 'password' => $token_id])){
            return response()->json(['message' => 'user not found'], 401);
        }
        $user = Auth::user();

        $classroom = new Classroom();
        $classroom->name = $request->get('classname');
        $classroom->professor_id = $user->id;
        $classroom->layout = $request->get('layout');
        $classroom->max_students = $request->get('max_students');
        $classroom->started_at = Carbon::now();

        $classroom->save();
        $classroom->refresh();

        return response()->json($classroom, 200);
    }

    public function searchClassroom(Request $request, string $id)
    {
        $classroom = Classroom::where('id','=',$id)->first();

        if(!$classroom) return response()->json(['message' => 'classroom not found'], 404);

        return response()->json($classroom, 200);
    }
}
