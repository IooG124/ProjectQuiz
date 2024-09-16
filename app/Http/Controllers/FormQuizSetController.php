<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormQuizSetController extends Controller
{
    public function index()
    {
        return view('QuizSet');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nama_quizz' => 'required|min:3',
            'mata_pelajaran' => 'required',
            'kelas' => 'required',
            'bahasa' => 'required',
            'visibilitas' => 'required',
            'gambar_profil' => 'required|image|mimes:png,jpg,jpeg,svg|size:2048|dimensions:ratio=16/9'

        ]);
    }
}
