<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\PengaturanQuiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        PengaturanQuiz::create([
            'nama_quizz' => '2',
            'mata_pelajaran' => 'rambo',
            'kelas' => '0887187281',
            'bahasa' => 'Jl. Gunung gunung',
            'visibilitas' => 'Jl. Gunung gunung',
            'gambar_profil' => 'Jl. Gunung gunung',
           
        ]);

        
    }
}
