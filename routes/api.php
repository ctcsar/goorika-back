<?php

use App\Http\Controllers\Api\RootController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;
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

// Методы регистрации и авторизации пользователя
Route::post('/reg', [AuthController::class, 'registration']);
Route::post('/login', [AuthController::class, 'signin']);
Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);

// Методы для пользователя с правами root
Route::middleware('auth:api', 'role:rootadmin')->get('/root/get-users', [RootController::class, 'getUsers']);
Route::middleware('auth:api', 'role:root')->post('/root/change-users-role', [RootController::class, 'changeRole']);

//Методы для товаров
Route::post('/product/create-product', [ProductsController::class, 'createProduct']);
Route::post('/product/update-product', [ProductsController::class, 'updateProduct']);
Route::get('/product/get-all-products', [ProductsController::class, 'getAllProducts']);
