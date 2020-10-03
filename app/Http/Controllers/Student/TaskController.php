<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\UploadFileTrait;
use App\Model\StudentTask;
use App\Model\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::paginate(20);
        return view('student.tasks.index',compact('tasks'));
    }


    public function store(Request $request){
        $this->validate($request,[
            'file'    => 'required|file|mimes:pdf|max:3000',
        ]);

        $data = $request->all();
        $data['file'] = UploadFileTrait::storeFile($request->file('file'),'student-task','file');
        $data['user_id'] = Auth::id();
        StudentTask::create($data);
        session()->flash('success','Task Uploaded Successfully');
        return back();
    }
}
