<?php

namespace App\Http\Controllers\Professor;

use App\Model\Score;
use App\Model\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    public function index(){
        $subject = Subject::where('user_id',Auth::id())->get();
        return view('professor.score.index',compact('subject'));
    }

    public function show($id){
        $score = Score::where('subject_id',$id)->paginate(20);
        return view('professor.score.show',compact('score'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
           'score' => 'numeric|max:100|min:0'
        ]);

//        if($request->ajax()){
//            $sc = Score::where('id',$id)->first();
//            $data = $request->all();
//            $sc->update($data);
//            $html = view('professor.score.score', ['sc' => $sc])->render();
//            return response(['status' => true, 'result' => $html]);
//        }

        $sc = Score::where('id',$id)->first();
        $data = $request->all();
        $sc->update($data);
        session()->flash('success','Score Updated Successfully');
        return back();
    }
}
