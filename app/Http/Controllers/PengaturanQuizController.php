<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengaturanQuiz;

class PengaturanQuizController extends Controller
{
public function create(){
    return view('QuizSet');
}

public function post(Request $request){
    // dd($request->all());
    
    $validatedData = $request->validate([
        'nama_quizz' => 'required',
        'mata_pelajaran' => 'required',
        'kelas' => 'required',
        'bahasa' => 'required',
        'visibilitas' => 'required',
        'gambar_profil' => 'required',
    ]);
    // dd($validatedData);
    
    PengaturanQuiz::create($validatedData);
    return redirect('/b')->with('createSupplier', 'pembuatan supplier berhasil');
}



}
