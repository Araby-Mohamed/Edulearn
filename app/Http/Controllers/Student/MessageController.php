<?php

namespace App\Http\Controllers\Student;

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

        $professor = User::where('level', 2)->where('id', $id)->first();
        if(!$professor)
            abort(404);

        return view('student.message.index', compact('message', 'professor'));
    }

    public function store(Request $request,$id)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $data['from_user'] = Auth::id();
            $data['to_user'] = $id;
            $mes = Message::create($data);
            $html = view('student.message.chat', ['mes' => $mes])->render();
            return response(['status' => true, 'result' => $html]);
        }
    }
}
