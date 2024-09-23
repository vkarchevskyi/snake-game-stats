<?php

use App\Http\Controllers\ScoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ScoreController::class, 'index'])->name('score.index');
Route::get('/{user}', [ScoreController::class, 'indexUser'])->name('score.user');
Route::post('/register', [UserController::class, 'create']);
