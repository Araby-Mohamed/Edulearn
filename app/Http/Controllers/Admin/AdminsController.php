<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Back\Admin\Store;
use App\Http\Requests\Back\Admin\Update;
use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->user()->level != 3){
            $admins = Admin::where('level',2)->get();
            return view('admin.admins.index',compact('admins'));
        }else{
            return redirect()->back();
        }

    }

    public function create()
    {
        if (Auth::guard('admin')->user()->level != 3) {
            return view('admin.admins.create');
        }else{
            return redirect()->back();
        }
    }


    public function store(Store $request)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $data = $request->all();
            $password = bcrypt($request->input('password'));
            $data['password'] = $password;
            $data['level'] = 2;
            Admin::create($data);
            session()->flash('success', 'Admin Added Successfully');
            return back();
        }else{
            return redirect()->back();
        }
    }


    public function show($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $admin = Admin::where('level', 2)->where('id', $id)->first();
            if (!$admin)
                abort(404);

            return view('admin.admins.show', compact('admin'));
        }else{
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $admin = Admin::where('level', 2)->where('id', $id)->first();
            if (!$admin)
                abort(404);

            return view('admin.admins.edit', compact('admin'));
        }else{
            return redirect()->back();
        }
    }

    public function update(Update $request, $id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $admin = Admin::where('level', 2)->where('id', $id)->first();

            if (!$admin)
                abort(404);

            $data = $request->all();

            if (!empty($data['password'])) {
                $data['password'] = bcrypt($request->input('password'));
            } else {
                unset($data['password']);
            }


            $admin->update($data);
            session()->flash('success', 'Admin Updated Successfully');
            return back();
        }else{
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $admin = Admin::where('level', 2)->where('id', $id)->first();

            if (!$admin)
                abort(404);

            $admin->delete();
            session()->flash('success', 'Admin Deleted Successfully');
            return back();
        }else{
            return redirect()->back();
        }
    }
}
