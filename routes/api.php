<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// Route Auth Controller (Login, Register)
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users', [AuthController::class, 'getAllUsers']);
Route::get('/users/{email}', [AuthController::class, 'getUsersByEmail']);


// Route Get All Users By Authenticated User
// Route::middleware('auth:api')->get('/users', [AuthController::class, 'getAllUsers']);
