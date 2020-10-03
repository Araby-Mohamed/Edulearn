<?php

namespace App\Http\Controllers\Professor;

use App\Http\Requests\Front\QuestionBank\Store;
use App\Http\Requests\Front\QuestionBank\Update;
use App\Model\QuestionBank;
use App\Model\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionBankController extends Controller
{
    public function index(){
        $subject = Subject::where('user_id',Auth::id())->get();
        return view('professor.question_bank.index',compact('subject'));
    }

    public function create(){
        $subject = Subject::where('user_id',Auth::id())->get();
        return view('professor.question_bank.create',compact('subject'));
    }

    public function store(Store $request){
        $data = $request->all();
        $data['user_id'] = Auth::id();
        QuestionBank::create($data);
        session()->flash('success','Added QuestionBank Successfully');
        return back();
    }

    public function show($id){
        $subject = Subject::where('user_id',Auth::id())->where('id',$id)->first();
        $question_bank = QuestionBank::where('subject_id',$id)->paginate(100);
        if(!$question_bank)
            abort(404);
        return view('professor.question_bank.show',compact('question_bank','subject'));
    }

    public function edit($id){
        $subject = Subject::where('user_id',Auth::id())->get();
        $question_bank = QuestionBank::where('user_id',Auth::id())->where('id',$id)->first();
        if(!$question_bank)
            abort(404);
        return view('professor.question_bank.edit',compact('question_bank','subject'));
    }

    public function update(Update $request,$id){
        $data = $request->all();
        $question_bank = QuestionBank::where('user_id',Auth::id())->where('id',$id)->first();
        if (!$question_bank)
            abort(404);

        $question_bank->update($data);
        session()->flash('success','Updated QuestionBank Successfully');
        return back();
    }

    public function destroy($id){
        $question_bank = QuestionBank::where('user_id',Auth::id())->where('id',$id)->first();
        if(!$question_bank)
            abort(404);
        $question_bank->delete();
        session()->flash('success','Deleted QuestionBank Successfully');
        return back();

    }


}
