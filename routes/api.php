<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
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

Route::get('/tweets', [TweetController::class, 'index']);
Route::post('/tweets/{tweet}/like', [TweetController::class, 'like'])->middleware('auth:sanctum');
Route::get('/users/{user}', [UserController::class, 'show']);
Route::get('/users/{user}/tweets', [UserController::class, 'tweets']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/auth', [LoginController::class, 'checkAuth'])->middleware('auth:sanctum');
Route::get('/logout', [LoginController::class, 'logout']);
