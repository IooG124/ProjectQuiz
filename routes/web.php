<?php

use App\Http\Controllers\PengaturanQuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Index');
});
Route::get('/a', function () {
    return view('Recap');
});
// Route::get('/b', function () {
//     return view('QuizSet');
// });
Route::get('/c', function () {
    return view('Resume'); 
});
Route::get('/d', function () {
    return view('Esai');
});
Route::get('/e', function () {
    return view('Pause');
});
Route::get('/f', function () {
    return view('Isian');
}); 


Route::get('/b', [PengaturanQuizController::class,'create']);
Route::post('/b', [PengaturanQuizController::class,'post']);