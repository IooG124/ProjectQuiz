<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormQuizSetController;
use App\Http\Controllers\QuizController;



Route::get('/', [FormQuizSetController::class, 'loadAll', ])->name('dashboard');
Route::get('/createquiz', [FormQuizSetController::class, 'index'])->name('create.quiz');
Route::get('/{categoryQuiz}/edit', [FormQuizSetController::class, 'edit', ])->name('edit.quiz');
Route::post('/quizindex', [FormQuizSetController::class, 'store'])->name('create.quiz.question');
Route::put('/{categoryQuiz}', [FormQuizSetController::class, 'update', ])->name('update.quiz');
Route::delete('/{categoryQuiz}', [FormQuizSetController::class, 'destroy', ])->name('destroy.quiz');

Route::resource('/{categoryQuiz}/quiz', QuizController::class);
// Route::post('/quizindex', [FormQuizSetController::class, 'store']);
