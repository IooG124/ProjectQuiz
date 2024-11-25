<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanQuiz extends Model
{
    protected $guarded = ['id'];

    public function quizzes(){
        return $this->hasMany(Quiz::class ,'pengaturan_quizzes_id', 'id');
    }
}
