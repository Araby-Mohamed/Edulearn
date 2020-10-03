<?php

namespace App\Http\Controllers\Api\student;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\MaterialResource;
use App\Model\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    use ApiResponseTrait;

    public function index($id){
        $material = MaterialResource::collection(Material::where('subject_id',$id)->paginate(20));
        if(!$material){
            return $this->apiResponse(null,'Material Not Found',404);
        }else{
            return $this->apiResponse($material);
        }
    }
}
