<?php

namespace App\Http\Controllers\Professor;

use App\Model\Message;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function show($id)
    {
        //$message = Message::where('to_user',Auth::id())->where('from_user',Auth::id())->orWhere('to_user',$id)->orWhere('from_user',$id)->get();
        $message = Message::where('from_user', Auth::id())->orWhere('to_user', Auth::id())->get();
        $student = User::where('level', 1)->where('id', $id)->first();
        if(!$student)
            abort(404);

        return view('professor.message.index', compact('message', 'student'));
    }

    public function store(Request $request,$id)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $data['from_user'] = Auth::id();
            $data['to_user'] = $id;
            $mes = Message::create($data);
            $html = view('professor.message.chat', ['mes' => $mes])->render();
            return response(['status' => true, 'result' => $html]);
        }
    }
//    public function index(){
//        $student = User::where('level',1)->get();
//        $first_student = User::where('level',1)->first();
//        $message = Message::where('from_user',Auth::id())->orWhere('to_user',Auth::id())->get();
//        //return response()->json([$student,$first_student,$message]);
//        return view('professor.message.index',compact('student','message','allUser','first_student'));
//    }

//    public function store(Request $request){
//        if($request->ajax()) {
//            $student = User::where('level', 1)->get();
//            $first_student = User::where('level', 1)->first();
//            $message = Message::where('from_user', Auth::id())->orWhere('to_user', Auth::id())->get();
//            $data = $request->all();
//            $data['from_user'] = Auth::id();
//            Message::create($data);
//            return back();
//            $html = view('professor.message.chat', ['message' => $message, 'student' => $student, 'first_student' => $first_student])->render();
//            return response(['status' => true, 'result' => $html]);
//        }
//        $message = new Message();
//        $message->from_user = Auth::id();
//        $message->to_user = $request->input('to_user');
//        $message->content = $request->input('content');
//        dd($message);
//        $message->save();
////            $data = $request->all();
////            $data['from_user'] = Auth::id();
////            $data['to_user'] = 29;
////            Message::create($data);
////            return back();
//
//

}
