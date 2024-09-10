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



Route::get('/', Controllers\DashboardController::class);


Route::get('/quizset', [Controllers\FormQuizSetController::class, 'index'])->name('quiz.set');
Route::post('/quizset', [Controllers\FormQuizSetController::class,'store'])->name('quiz.set.upload');