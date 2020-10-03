<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professor';

    protected $fillable = ['user_id','pro_degree'];
}
