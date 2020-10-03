<?php

namespace App\Http\Controllers\Student;

use App\Model\Student;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $id = Auth::id();
        $student = Student::where('user_id',$id)->first();
        return view('student.profile.index',compact('student'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'password' => 'required|min:6|max:50'
        ]);

        $user = User::find(Auth::id());
        $user->password = bcrypt($request->password);
        $user->save();

        session()->flash('success','Profile Updated Successfully');
        return back();
    }
}
