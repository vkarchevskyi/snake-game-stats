<?php

use App\Http\Controllers\ScoreController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', [ScoreController::class, 'index'])->name('score.index');
Route::get('/{user}', [ScoreController::class, 'indexUser'])->name('score.user');
Route::post('/add', [ScoreController::class, 'create'])
    ->withoutMiddleware([VerifyCsrfToken::class])
    ->name('score.create');
