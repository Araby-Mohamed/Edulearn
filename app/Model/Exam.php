<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exam';

    protected $fillable = ['title','file','subject_id','user_id'];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
