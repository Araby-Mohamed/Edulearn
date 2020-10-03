<?php

namespace App\Http\Controllers\Admin;

use App\Model\Material;
use App\Model\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    public function index($id){
        $material = Material::where('subject_id',$id)->get();
        $subject = Subject::find($id);
        return view('admin.material.index',compact('material','subject'));
    }
}
