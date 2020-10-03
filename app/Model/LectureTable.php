<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LectureTable extends Model
{
    protected $table = 'lecture_table';

    protected $fillable = ['title','image'];
}
