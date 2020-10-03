<?php

namespace App\Http\Controllers\Student;

use App\Model\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    public function index(){
        $subject = Subject::paginate(20);
        return view('student.subject.index',compact('subject'));
    }
}
