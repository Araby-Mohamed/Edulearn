<?php

namespace App\Http\Controllers\Admin;

use App\Model\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function index(){
        $exam = Exam::all();
        return view('admin.exam.index',compact('exam'));
    }
}
