<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassroomController;

Route::post('/create-class', [ClassroomController::class, 'createClassroom']);
// Route::patch('/next', [ApiController::class, 'assistNextStudent']);
// Route::patch('/stop', [ApiController::class, 'stopAssist']);

// Student Routes
Route::get('/search-class/{id}', [ClassroomController::class, 'searchClassroom']);
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
