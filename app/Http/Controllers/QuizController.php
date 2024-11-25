<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\PengaturanQuiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($categoryQuizId)
    {
        $quiz = PengaturanQuiz::with('quizzes')->findOrFail($categoryQuizId);
        $quizzes = $quiz->quizzes;

        return view('dashboard.quiz.index',[
            'quiz' => $quiz,
            'quizzes' => $quizzes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($categoryQuizId)
    {
        $quiz = PengaturanQuiz::with('quizzes')->findOrFail($categoryQuizId);

        return view('dashboard.quiz.create',[
            'quiz' => $quiz,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $categoryQuizId)
    {
        $quiz = PengaturanQuiz::with('quizzes')->findOrFail($categoryQuizId);
        // dd($request->all());
        
        $validatedData = $request->validate([   
            'pengaturan_quizzes_id' => '',
            'nama_soal' => 'required',
            'jawaban' => 'required',
        ]);
        $validatedData['pengaturan_quizzes_id'] = $categoryQuizId;
        $jawabanBenar = $request->pilihan[$validatedData['jawaban']];
        $validatedData['jawaban'] = $request->jawaban .'. '. $jawabanBenar;

        // dd($validatedData);
        Quiz::create($validatedData);
        return redirect("/$categoryQuizId/quiz")->with('updateCategoryQuiz', 'update Kategori Quiz berhasil');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
