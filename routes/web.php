<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('app');
})->where("any", ".*");

Route::post('/api/auth/register', [AuthController::class, 'register']);
Route::post('/api/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/api/auth/user', [AuthController::class, 'user']);
    Route::post('/api/auth/logout', [AuthController::class, 'logout']);
});
