<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PengaturanQuiz;
use Illuminate\Support\Facades\Storage;


class FormQuizSetController extends Controller
{
    public function index()
    {
        return view('quiz.QuizSet',[
            'title' => 'Pengaturan Quiz',
        ]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nama_quizz' => 'required|min:3',
            'mata_pelajaran' => 'required',
            'kelas' => 'required',
            'bahasa' => 'required',
            'gambar_profil' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);
        try{
        if ($request->hasFile('gambar_profil')) {
            $file = $request->file('gambar_profil');
            $filename = time() . '_' . $file->getClientOriginalName();
            // simpan file di storage/public/images
            $path = $file->storeAs('public/images', $filename); 
            $filenamenew = 'images/' . $filename;

            // Simpan path file di database
            $quiz = new PengaturanQuiz();
            $quiz->nama_quizz = $request->input('nama_quizz');
            $quiz->mata_pelajaran = $request->input('mata_pelajaran');
            $quiz->kelas = $request->input('kelas');
            $quiz->bahasa = $request->input('bahasa');
            $quiz->gambar_profil = $filenamenew;

            $quiz->save();
            return redirect()->route('dashboard');
        }
        } catch (\Exception $e){
            return redirect()->back()->withErrors(['gambar_profil' => 'Gagal mengupload gambar: ' . $e->getMessage()]);
        }
    }

    public function loadAll(){
        $quizzes = PengaturanQuiz::all();
        return view('dashboard.index', compact('quizzes'))->with('title',"Quiz");
    }


    public function edit(PengaturanQuiz $categoryQuiz)
    {
        return view('dashboard.edit',[
            'quiz' => $categoryQuiz,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengaturanQuiz $categoryQuiz)
    {   

        $validatedData = $request->validate([
            'nama_quizz' => 'required|min:3',
            'mata_pelajaran' => 'required',
            'kelas' => 'required',
            'bahasa' => 'required',
            'gambar_profil' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);

        try{
            if ($request->hasFile('gambar_profil')) {
                $file = $request->file('gambar_profil');
                $filename = time() . '_' . $file->getClientOriginalName();
                // simpan file di storage/public/images
                $path = $file->storeAs('public/images', $filename); 
                $filenamenew = 'images/' . $filename;
    
                $validatedData['gambar_profil'] = $filenamenew;
    
                
            }
            } catch (\Exception $e){
                return redirect()->back()->withErrors(['gambar_profil' => 'Gagal mengupload gambar: ' . $e->getMessage()]);
            }

            PengaturanQuiz::where('id', $categoryQuiz->id)->update($validatedData);
        return redirect('/')->with('updateCategoryQuiz', 'update Kategori Quiz berhasil');
    }



    public function destroy(PengaturanQuiz $categoryQuiz)
    {
        PengaturanQuiz::destroy($categoryQuiz->id);
        return redirect('/')->with('deleteCategoryQuiz', 'hapus Kategori Quiz berhasil');
    }
}