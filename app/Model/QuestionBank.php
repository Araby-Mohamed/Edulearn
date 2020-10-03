<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    protected $table = 'question_bank';

    protected $fillable = ['title','answer','subject_id','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
