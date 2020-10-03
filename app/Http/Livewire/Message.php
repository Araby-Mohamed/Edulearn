<?php

namespace App\Http\Livewire;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Message extends Component
{
    public $content;

    public $to_user;

    public function increment(){
        dd('test');
    }

    public function storeMessage($to_user){
//        $data = $request->all();
//        $data['from_user'] = Auth::id();
//        \App\Model\Message::create($data);
        $message = new \App\Model\Message();
        $message->from_user = Auth::id();
        $message->to_user = $to_user;
        $message->content = $this->content;
        dd($message);
        $message->save();
        //return back();
    }

    public function render()
    {
        $student = User::where('level',1)->get();
        $first_student = User::where('level',1)->first();
        $message = \App\Model\Message::where('from_user',Auth::id())->orWhere('to_user',Auth::id())->get();
        return view('livewire.message',[
            'student'       => $student,
            'first_student' => $first_student,
            'message'       => $message
        ]);
    }
}
