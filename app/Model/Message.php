<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';

    protected $fillable = ['from_user','to_user','content'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
