<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'score';

    protected $fillable = ['score','user_id','subject_id'];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
