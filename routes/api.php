<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserMetaController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function() {
    Route::post('/auth/request-otp', 'requestOtp');
    Route::post('/auth/confirm-otp', 'confirmOtp');
});

Route::controller(UsersController::class)->group(function() {
    Route::post('/users', 'register');
});

Route::middleware(['auth:api', 'admin'])->group(function () {
    Route::post('/users/fields', [UserMetaController::class, 'create']);
    Route::get('/users/fields', [UserMetaController::class, 'list']);
    Route::delete('/users/fields/{id}', [UserMetaController::class, 'delete']);
});
