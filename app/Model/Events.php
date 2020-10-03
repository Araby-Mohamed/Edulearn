<?php

namespace App\Model;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';

    protected $fillable = ['title', 'content', 'image', 'admin_id'];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
