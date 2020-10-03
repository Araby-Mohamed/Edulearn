<?php

namespace App\Http\Controllers\Professor;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index(){
        $student = User::where('level',1)->paginate(20);
        //return $student;
        return view('professor.student.index',compact('student'));
    }
}
