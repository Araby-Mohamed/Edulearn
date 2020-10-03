<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UploadFileTrait;
use App\Http\Requests\Back\LectureTable\Update;
use App\Model\LectureTable;
use foo\bar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LectureTableController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $tables = LectureTable::all();
            return view('admin.lecture_table.index', compact('tables'));
        }else{
            return back();
        }
    }


    public function create()
    {
        if (Auth::guard('admin')->user()->level != 3) {
            return view('admin.lecture_table.create');
        }else{
            return back();
        }
    }


    public function store(Request $request)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $data = $request->all();
            $data['image'] = UploadFileTrait::storeFile($request->file('image'), 'lecture_table', 'image');
            LectureTable::create($data);
            session()->flash('success', 'Lecture Table Added Successfully');
            return back();
        }else{
            return back();
        }
    }


    public function show($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $table = LectureTable::find($id);
            if (!$table)
                abort(404);

            return view('admin.lecture_table.show', compact('table'));
        }else{
            return back();
        }
    }


    public function edit($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $table = LectureTable::find($id);
            if (!$table)
                abort(404);

            return view('admin.lecture_table.edit', compact('table'));
        }else{
            return back();
        }
    }


    public function update(Update $request, $id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $table = LectureTable::find($id);
            if (!$table)
                abort(404);

            $data = $request->all();
            $data['image'] = UploadFileTrait::updateFile($request->file('image'), 'lecture_table', 'image', $table->image);
            $table->update($data);
            session()->flash('success', 'Lecture Table Updated Successfully');
            return back();
        }else{
            return back();
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $table = LectureTable::find($id);
            if (!$table)
                abort(404);

            \File::Delete('media/images/lecture_table/' . $table->image);
            $table->delete();
            session()->flash('success', 'Lecture Table Deleted Successfully');
            return back();
        }else{
            return back();
        }
    }
}
