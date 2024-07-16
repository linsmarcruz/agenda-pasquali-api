<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::post('auth', [AuthController::class, 'auth']);
Route::post('users/create_account', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::get('schedules/filter', [ScheduleController::class, 'filterByDateRange']);
    Route::apiResource('schedules', ScheduleController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});