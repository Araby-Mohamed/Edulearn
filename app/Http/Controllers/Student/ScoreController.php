<?php

namespace App\Http\Controllers\Student;

use App\Model\Score;
use App\Model\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    public function index(){
        $score = Score::where("user_id",Auth::id())->get();
        $studentNumber = Student::where('user_id',Auth::id())->first();
        return view('student.score.index',compact('score','studentNumber'));
    }
}
