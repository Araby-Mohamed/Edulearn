<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UploadFileTrait;
use App\Http\Requests\Back\Subject\Store;
use App\Http\Requests\Back\Subject\Update;
use App\Model\Subject;
use App\User;
use foo\bar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{

    use UploadFileTrait;

    public function index()
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $subjects = Subject::join('users', 'subject.user_id', '=', 'users.id')->select('subject.*', 'users.first_name', 'users.last_name')->get();
            return view('admin.subject.index', compact('subjects'));
        }else{
            return back();
        }
    }


    public function create()
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $professor = User::where('level', 2)->get();
            return view('admin.subject.create', compact('professor'));
        }else{
            return back();
        }
    }


    public function store(Store $request)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $data = $request->all();
            $data['image'] = UploadFileTrait::storeFile($request->file('image'), 'subject', 'image');
            Subject::create($data);
            session()->flash('success', 'Subject Added Successfully');
            return back();
        }else{
            return back();
        }
    }

    // Show Material By Id
    public function show($id)
    {
        //abort(404);
        return back();
    }


    public function edit($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $professor = User::where('level', 2)->get();
            $subject = Subject::find($id);
            if (!$subject)
                abort(404);

            return view('admin.subject.edit', compact('professor', 'subject'));
        }else{
            return back();
        }
    }


    public function update(Update $request, $id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $subject = Subject::find($id);
            if (!$subject)
                abort(404);
            $data = $request->all();
            $data['image'] = UploadFileTrait::updateFile($request->file('image'), 'subject', 'image', $subject->image);
            $subject->update($data);
            session()->flash('success', 'Subject Updated Successfully');
            return back();
        }else{
            return back();
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $subject = Subject::find($id);
            if (!$subject)
                abort(404);

            \File::Delete('media/images/subject/' . $subject->image);
            $subject->delete();
            session()->flash('success', 'Subject Deleted Successfully');
            return back();
        }else{
            return back();
        }
    }
}
