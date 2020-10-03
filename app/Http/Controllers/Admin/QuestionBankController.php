<?php

namespace App\Http\Controllers\Admin;

use App\Model\QuestionBank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionBankController extends Controller
{
    public function index(){
        $questions = QuestionBank::paginate(40);
        return view('admin.question_bank.index',compact('questions'));
    }
}
