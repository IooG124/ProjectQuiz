<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormQuizSetController;



Route::get('/', [FormQuizSetController::class, 'loadAll', ])->name('dashboard');
Route::get('/createquiz', [FormQuizSetController::class, 'index'])->name('create.quiz');
Route::post('/quizindex', [FormQuizSetController::class, 'store'])->name('create.quiz.question');

// Route::post('/quizindex', [FormQuizSetController::class, 'store']);
