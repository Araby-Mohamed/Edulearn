<?php

namespace App\Http\Controllers\Student;

use App\Model\QuestionBank;
use App\Model\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionBankController extends Controller
{
    public function index(){
        $subject = Subject::paginate(20);
        return view('student.question_bank.index',compact('subject'));
    }

    public function show($id){
        $subject = Subject::where('id',$id)->first();
        $question_bank = QuestionBank::where('subject_id',$id)->paginate(100);
        if(!$question_bank)
            abort(404);
        return view('student.question_bank.show',compact('question_bank','subject'));
    }
}
