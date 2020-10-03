<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Events;
use App\Model\LectureTable;
use App\Model\Subject;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Student Count
        $student_count = User::where('level',1)->count();
        // Professor Count
        $professor_count = User::where('level',2)->count();
        // Subject Count
        $subject_count = Subject::count();
        // Event Count
        $event_count = Events::count();
        // Get Latest 5 Student
        $new_student = User::where('level',1)->orderby('id','DESC')->limit(5)->get();

        return view('admin.dashboard',compact('student_count','professor_count','subject_count','event_count','new_student'));
    }
}
