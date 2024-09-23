<?php

use App\Http\Controllers\ScoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/user', [UserController::class, 'get'])->middleware('auth:sanctum');

Route::post('/add', [ScoreController::class, 'create'])
    ->middleware('auth:sanctum')
    ->name('score.create');
