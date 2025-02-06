<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketReplyController;
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
    Route::put('/tickets', [TicketController::class, 'update']);
});

Route::middleware(['auth:api', 'user'])->group(function () {
    Route::post('/tickets', [TicketController::class, 'create']);
});

Route::middleware('auth:api')->group(function () {
    Route::post('/tickets/{id}/reply', [TicketReplyController::class, 'create']);
    Route::get('/tickets', [TicketController::class, 'list']);
    Route::get('/tickets/{id}', [TicketController::class, 'get']);
    Route::get('/tickets/{id}/reply', [TicketController::class, 'listReplies']);
});
