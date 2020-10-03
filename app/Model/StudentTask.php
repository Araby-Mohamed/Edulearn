<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class StudentTask extends Model
{
    protected $table = 'student_task';

    protected $fillable = ['file','user_id','subject_id','task_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }


}
