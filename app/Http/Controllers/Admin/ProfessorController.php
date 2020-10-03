<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UploadFileTrait;
use App\Http\Requests\Back\Professor\Store;
use App\Http\Requests\Back\Professor\Update;
use App\Model\Professor;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{

    public function index()
    {
        $professor = User::where('level',2)->get();
        return view('admin.professor.index',compact('professor'));
    }


    public function create()
    {
        return view('admin.professor.create');
    }


    public function store(Store $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->input('password'));
        $data['image'] = UploadFileTrait::storeFile($request->file('image'),'professor','image');
        $data['level'] = 2;
        $user = User::create($data);


        $professor = new Professor();
        $professor->user_id = $user->id;
        $professor->pro_degree = $data['pro_degree'];

        $professor->save();
        session()->flash('success','Professor Added Successfully');
        return back();
    }


    public function show($id)
    {
        // Get Professor
        $user = User::where('id',$id)->where('level',2)->first();
        // Get pro_degree
        $professor_degree = Professor::where('user_id',$id)->first();

        return view('admin.professor.show',compact('user','professor_degree'));
    }


    public function edit($id)
    {
        // Get Professor
        $user = User::where('id',$id)->where('level',2)->first();
        // Get pro_degree
        $prof = Professor::where('user_id',$id)->first();

        return view('admin.professor.edit',compact('user','prof'));

    }


    public function update(Update $request, $id)
    {
        $user = User::where('level',2)->where('id',$id)->first();

        if(!$user)
            abort(404);

        $data = $request->all();

        if(!empty($data['image'])){
            $data['image'] = UploadFileTrait::updateFile($request->file('image'),'professor','image',$user->image);
        }else{
            unset($data['image']);
        }

        if(!empty($data['password'])){
            $data['password'] = bcrypt($request->input('password'));
        }else{
            unset($data['password']);
        }

        $data2 = [
            $user->gender = $request->input('gender')
        ];

        //return $data;
        $user->update($data,$data2);

        $professor = Professor::where('user_id',$id)->first();
        $professor->pro_degree = $data['pro_degree'];
        $professor->save();
        session()->flash('success','Professor Updated Successfully');
        return back();
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $user = User::where('level', 2)->where('id', $id)->first();

            if (!$user)
                abort(404);

            \File::Delete('media/images/professor/' . $user->image);

            $user->delete();
            session()->flash('success', 'Professor Deleted Successfully');
            return back();
        }else{
            return back();
        }
    }
}
