<?php

namespace App\Http\Controllers\Student;

use App\Model\Exam;
use App\Model\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function index(){
        $subject = Subject::all();
        $exams = Exam::paginate(20);
        return view('student.exam.index',compact('subject','exams'));
    }
}
