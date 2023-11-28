<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassroomController;

Route::middleware('auth:sanctum')->get('/bearer_token_user', function (Request $request) {
    return Auth::user();
});



Route::middleware('auth:sanctum')->post('/create-class', [ClassroomController::class, 'createClassroom']);
// Route::patch('/next', [ClassroomController::class, 'assistNextStudent']);
// Route::patch('/stop', [ClassroomController::class, 'stopAssist']);

// Student Routes
Route::middleware('auth:sanctum')->get('/search-class/{id}', [ClassroomController::class, 'searchClassroom']);
Route::middleware('auth:sanctum')->post('/join/{id}', [ClassroomController::class, 'joinClassroom']);
Route::middleware('auth:sanctum')->post('/ask', [ClassroomController::class, 'askAssistance']);
Route::middleware('auth:sanctum')->get('/update', [ClassroomController::class, 'updateStatus']);

// Professor/Student Route
Route::get('/users', [UserController::class, 'allUsers']);
Route::get('/user', [UserController::class, 'user']);
Route::post('/user', [UserController::class, 'LoginOrRegister']);
// Route::get('/exit', [ClassroomController::class, 'exitClassroom']);

// Route::get('/reports', [ReportController::class, 'listReports']);
// Route::get('/report', [ReportController::class, 'getReport']);
