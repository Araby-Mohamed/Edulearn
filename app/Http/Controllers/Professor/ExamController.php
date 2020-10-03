<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\UploadFileTrait;
use App\Http\Requests\Front\Exam\Store;
use App\Http\Requests\Front\Exam\Update;
use App\Model\Exam;
use App\Model\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index(){
        $subject = Subject::where('user_id',Auth::id())->get();
        $exams = Exam::where('user_id',Auth::id())->paginate(20);
        return view('professor.exam.index',compact('subject','exams'));
    }

    public function create(){
        $subject = Subject::where('user_id',Auth::id())->get();
        return view('professor.exam.create',compact('subject'));
    }

    public function store(Store $request){
        $data = $request->all();
        $data['file'] = UploadFileTrait::storeFile($request->file('file'),'exam','file');
        $data['user_id'] = Auth::id();
        Exam::create($data);
        session()->flash('success','Exam Added Successfully');
        return back();
    }

    public function edit($id){
        $subject = Subject::where('user_id',Auth::id())->get();
        $exam = Exam::where('user_id',Auth::id())->where('id',$id)->first();
        if(!$exam)
            abort(404);
        return view('professor.exam.edit',compact('subject','exam'));
    }

    public function update(Update $request,$id){
        $exam = Exam::where('user_id',Auth::id())->where('id',$id)->first();
        $data = $request->all();
        if(!empty($data['file'])){
            $data['file'] = UploadFileTrait::updateFile($request->file('file'),'exam','file',$exam->file);
        }else{
            unset($data['file']);
        }

        $exam->update($data);
        session()->flash('success','Exam Updated Successfully');
        return back();
    }

    public function destroy($id){
        $exam = Exam::where('user_id',Auth::id())->where('id',$id)->first();
        if(!$exam)
            abort(404);

        \File::Delete('media/files/exam/'.$exam->file);
        $exam->delete();
        session()->flash('success','Exam Deleted Successfully');
        return back();
    }

}
