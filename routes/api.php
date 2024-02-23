<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::get('/cars', [CarsController::class, 'getCars']);
Route::get('/cars/{id}', [CarsController::class, 'getCar']);
Route::post('/cars/{id}', [CarsController::class, 'setCar']);
Route::post('/cars/{id}/unset', [CarsController::class, 'freeCar']);

Route::get('/users', [UsersController::class, 'getUsers']);
Route::get('/users/{id}', [UsersController::class, 'getUser']);
