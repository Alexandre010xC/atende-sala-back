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

    public function joinClassroom(Request $request, string $id)
    {
        $token_id = $request->token_id;
        if(!Auth::attempt(['token_id' => $token_id, 'password' => $token_id])){
            return response()->json(['message' => 'user not found'], 401);
        }
        $user = Auth::user();

        $classroom = Classroom::where('id','=',$id)->first();

        $studentPresence = new StudentsClassroom();
        $studentPresence->classroom_id = $classroom->id;
        $studentPresence->student_id = $user->id;
        $studentPresence->seat = $request->seat;

        $studentPresence->save();
        $studentPresence->refresh();

        return response()->json($studentPresence, 200);
    }

    public function askAssistance(Request $request)
    {
        $token_id = $request->token_id;
        if(!Auth::attempt(['token_id' => $token_id, 'password' => $token_id])){
            return response()->json(['message' => 'user not found'], 401);
        }
        $user = Auth::user();


        $asked = QueueRequest::where('student_id','=',$user->id)->first();
        if($asked){
            $asked->destroy();
            return response()->join(['position' => 'null'], 200);
        }

        $presence = StudentsClassroom::where('student_id','=',$user->id)->first();

        $assistance = new QueueRequest();
        $assistance->classroom_id = $presence->classroom_id;
        $assistance->student_id = $presence->student_id;
        $assistance->requested_at = Carbon::now();

        $assistance->save();
        $assistance->refresh();

        $qtWaiting = QueueRequest::where('classroom_id','=',$assistance->classroom_id)
            ->where('id','<=',$assistance->id)
            ->whereNull('ended_at')
            ->count();
        $position = ["position" => $qtWaiting];

        return response()->json($position, 200);
    }

    public function updateStatus(Request $request)
    {
        $token_id = $request->token_id;
        if(!Auth::attempt(['token_id' => $token_id, 'password' => $token_id])){
            return response()->json(['message' => 'user not found'], 401);
        }
        $user = Auth::user();

        $presence = StudentsClassroom::where('student_id','=',$user->id)->first();

        $qtWaiting = QueueRequest::where('classroom_id','=',$presence->classroom_id)
            ->where('id','<=',$presence->student_id)
            ->whereNull('ended_at')
            ->count();
            
        $position = ["position" => $qtWaiting];

        return response()->json($position, 200);
    }

}
