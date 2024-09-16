<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('Index');
// });
// Route::get('/a', function () {
//     return view('Recap');
// });
// // Route::get('/b', function () {
// //     return view('QuizSet');
// // });
// Route::get('/c', function () {
//     return view('Resume'); 
// });
// Route::get('/d', function () {
//     return view('Esai');
// });
// Route::get('/e', function () {
//     return view('Pause');
// });
// Route::get('/f', function () {
//     return view('Isian');
// }); 



Route::get('/', Controllers\DashboardController::class)->name('dashboard');

Route::get('/createquiz', [Controllers\FormQuizSetController::class, 'index'])->name('create.quiz');
Route::post('/createquiz', [Controllers\FormQuizSetController::class,'store'])->name('create.quiz.upload');

// Route::get('/createquestions')
