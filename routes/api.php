<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'getAllUsers'])->middleware('auth');
Route::post('/users', [UserController::class, 'createNewUser'])->middleware('auth');
Route::put('/users', [UserController::class, 'updateUser']);
Route::post('/reg', [AuthController::class, 'postReg']);
Route::post('/login', [AuthController::class, 'postSignin']);
