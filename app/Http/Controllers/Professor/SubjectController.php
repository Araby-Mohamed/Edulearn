<?php

namespace App\Http\Controllers\Professor;

use App\Model\Material;
use App\Model\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index(){
        $subject = Subject::where('user_id',Auth::id())->get();
        return view('professor.subject.index',compact('subject'));
    }
}
