<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Requests\Back\Profile\Update;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        return view('admin.profile.index');
    }


    public function update(Update $request)
    {
        $id = Auth::guard('admin')->user()->id;
        $user = Admin::find($id);
        $data = $request->all();

        if(!empty($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }

        $user->update($data);
        session()->flash('success','Profile Updated Successfully');
        return back();
    }

    public function logout(){
        if(\auth()->guard('admin')->check()){
            Auth::guard('admin')->logout();
        }

        return redirect('admin/login');
    }

}
