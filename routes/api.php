<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

// Route Auth Controller (Login, Register)
Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users', [AuthController::class, 'getAllUsers']);
Route::get('/users/{email}', [AuthController::class, 'getUsersByEmail']);

// Route CRUD Books For Publisher
Route::post('/books', [BookController::class, 'store']);
// Route Get All Users By Authenticated User
// Route::middleware('auth:api')->get('/users', [AuthController::class, 'getAllUsers']);
