<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassroomController;

Route::middleware('auth:sanctum')->get('/bearer_token_user', function (Request $request) {
    return Auth::user();
});



Route::post('/create-class', [ClassroomController::class, 'createClassroom']);
// Route::patch('/next', [ClassroomController::class, 'assistNextStudent']);
// Route::patch('/stop', [ClassroomController::class, 'stopAssist']);

// Student Routes
Route::get('/search-class/{id}', [ClassroomController::class, 'searchClassroom']);
Route::post('/join/{id}', [ClassroomController::class, 'joinClassroom']);
Route::post('/ask', [ClassroomController::class, 'askAssistance']);

// Professor/Student Route
Route::get('/users', [UserController::class, 'allUsers']);
Route::get('/user', [UserController::class, 'user']);
Route::post('/user', [UserController::class, 'LoginOrRegister']);
Route::get('/update', [ClassroomController::class, 'updateStatus']);
// Route::get('/exit', [ClassroomController::class, 'exitClassroom']);

// Route::get('/reports', [ReportController::class, 'listReports']);
// Route::get('/report', [ReportController::class, 'getReport']);
