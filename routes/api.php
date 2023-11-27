<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/user', function(Request $request){
//     if(Auth::attempt(['token_id' => $request->token, 'password' => $request->token])){
//         $user = Auth::user();
//         $auth_token = $user->createToken('JWT');

//         return response()->json($auth_token, 200);
//     }

//     return response()->json('Usuário invalido', 401);
// });


Route::post('/create-class', [ApiController::class, 'createClassroom']);
// Route::patch('/next', [ApiController::class, 'assistNextStudent']);
// Route::patch('/stop', [ApiController::class, 'stopAssist']);

// Student Routes
// Route::get('/search-class', [ApiController::class, 'searchClassroom']);
// Route::post('/join', [ApiController::class, 'joinClassroom']);
// Route::patch('/ask', [ApiController::class, 'askAssistance']);

// Professor/Student Route
Route::get('/users', [UserController::class, 'allUsers']);
Route::get('/user', [UserController::class, 'user']);
Route::post('/user', [UserController::class, 'LoginOrRegister']);
// Route::get('/update', [ApiController::class, 'updateStatus']);
// Route::get('/exit', [ApiController::class, 'exitClassroom']);

// Route::get('/reports', [ApiController::class, 'listReports']);
// Route::get('/report', [ApiController::class, 'getReport']);
