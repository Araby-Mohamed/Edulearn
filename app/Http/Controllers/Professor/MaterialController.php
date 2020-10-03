<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\UploadFileTrait;
use App\Http\Requests\Front\Material\Update;
use App\Http\Requests\Front\Material\Store;
use App\Model\Material;
use App\Model\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    public function index($id){
        $material = Material::where('subject_id',$id)->where('user_id',Auth::id())->get();
        return view('professor.material.index',compact('material'));
    }
    public function create(){
        $subject = Subject::where('user_id',Auth::id())->get();
        return view('professor.material.create',compact('subject'));
    }

    public function store(Store $request){
        $data = $request->all();
        $data['file'] = UploadFileTrait::storeFile($request->file('file'),'material','file');
        $data['user_id'] = Auth::id();
        Material::create($data);
        session()->flash('success','Material Added Successfully');
        return back();
    }

    public function edit($id){
        $material = Material::where('user_id',Auth::id())->where('id',$id)->first();
        $subject = Subject::where('user_id',Auth::id())->get();
        if($material)
            return view('professor.material.edit',compact('material','subject'));

        abort(404);
    }

    public function update(Update $request,$id){
        $material = Material::where('user_id',Auth::id())->where('id',$id)->first();
        if($material){
            $data = $request->all();

            if(!empty($data['file'])){
                $data['file'] = UploadFileTrait::updateFile($request->file('file'),'material','file',$material->file);
            }else{
                unset($data['file']);
            }

            $material->update($data);
            session()->flash('success','Material Updated Successfully');
            return back();
        }else{
            abort(404);
        }
    }

    public function destroy($id){
        $material = Material::where('user_id',Auth::id())->where('id',$id)->first();
        if(!$material)
            abort(404);

        \File::Delete('media/files/material/' . $material->file);
        $material->delete();
        session()->flash('success','Material Deleted Successfully');
        return back();
    }
}
