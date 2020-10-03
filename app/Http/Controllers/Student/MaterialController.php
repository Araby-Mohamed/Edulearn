<?php

namespace App\Http\Controllers\Student;

use App\Model\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    public function index($id){
        $material = Material::where('subject_id',$id)->paginate(20);
        return view('student.material.index',compact('material'));
    }
}
