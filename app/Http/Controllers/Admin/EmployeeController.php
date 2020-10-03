<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Requests\Back\Employee\Store;
use App\Http\Requests\Back\Employee\Update;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $employees = Admin::where('level', 3)->get();
            return view('admin.employee.index', compact('employees'));
        }else{
            return redirect()->back();
        }
    }


    public function create()
    {
        if (Auth::guard('admin')->user()->level != 3) {
            return view('admin.employee.create', compact('employees'));
        }else{
            return redirect()->back();
        }
    }


    public function store(Store $request)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $data = $request->all();
            $data['password'] = bcrypt($request->input('password'));
            $data['level'] = 3;
            Admin::create($data);
            session()->flash('success', 'Employee Added Successfully');
            return back();
        }else{
            return redirect()->back();
        }
    }


    public function show($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $employee = Admin::where('level', 3)->where('id', $id)->first();

            return view('admin.employee.show', compact('employee'));
        }else{
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $employee = Admin::where('level', 3)->where('id', $id)->first();
            if (!$employee)
                abort(404);

            return view('admin.employee.edit', compact('employee'));
        }else{
            return redirect()->back();
        }
    }


    public function update(Update $request, $id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $employee = Admin::where('level', 3)->where('id', $id)->first();

            if (!$employee)
                abort(404);

            $data = $request->all();

            if (!empty($data['password'])) {
                $data['password'] = bcrypt($request->input('password'));
            } else {
                unset($data['password']);
            }

            $employee->update($data);
            session()->flash('success', 'Employee Updated Successfully');
            return back();
        }else{
            return redirect()->back();
        }

    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $employee = Admin::where('level', 3)->where('id', $id)->first();

            if (!$employee)
                abort(404);

            $employee->delete();
            session()->flash('success', 'Employee Deleted Successfully');
            return back();
        }else{
            return redirect()->back();
        }
    }
}
