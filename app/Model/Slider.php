<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';

    protected $fillable = ['title','content','button_title_1','button_title_2','button_url_1','button_url_2','image'];
}
