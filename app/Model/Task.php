<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';

    protected $fillable = ['title','content','file','end_date','user_id','subject_id'];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
