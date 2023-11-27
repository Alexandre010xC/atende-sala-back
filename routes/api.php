<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/users', [UserController::class, 'allUsers']);
Route::post('/users', [UserController::class, 'storeOrFind']);

Route::get('/', function(){
    return response()->json(['success' => true]);
});

// Route::post('/create-class', [ApiController::class, 'createClassroom']);
// Route::patch('/next', [ApiController::class, 'assistNextStudent']);
// Route::patch('/stop', [ApiController::class, 'stopAssist']);

// // Student Routes
// Route::get('/class', [ApiController::class, 'searchClassroom']);
// Route::post('/join', [ApiController::class, 'joinClassroom']);
// Route::patch('/ask', [ApiController::class, 'askAssistance']);

// // Professor/Student Route
// Route::post('/user', [ApiController::class, 'manageUser']);
// Route::get('/update', [ApiController::class, 'updateStatus']);
// Route::get('/exit', [ApiController::class, 'exitClassroom']);

// // Any
// Route::get('/reports', [ApiController::class, 'listReports']);
// Route::get('/report', [ApiController::class, 'getReport']);
