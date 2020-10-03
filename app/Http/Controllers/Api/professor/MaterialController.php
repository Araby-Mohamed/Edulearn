<?php

namespace App\Http\Controllers\Api\professor;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\UploadFileTrait;
use App\Http\Requests\Front\Material\Store;
use App\Http\Requests\Front\Material\Update;
use App\Http\Resources\MaterialResource;
use App\Model\Material;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    use ApiResponseTrait;

    public function index($id){
        $material = MaterialResource::collection(Material::where('subject_id',$id)->where('user_id',Auth::id())->get());
        return $this->apiResponse($material);
    }

    public function store(Request $request){

        $storeValidation = new Store();
        $validate = Validator::make($request->all(),$storeValidation->rules());

        if($validate->fails()){
            return $this->apiResponse($validate->errors(),404);
        }else{
            $data = $request->all();
            $data['file'] = UploadFileTrait::storeFile($request->file,'material','file');
            $data['user_id'] = Auth::id();
            Material::create($data);
            return $this->apiResponse('Material Added Successfully');
        }

    }


    public function update(Request $request,$id){
        $updateValidation = new Update();
        $validate = Validator::make($request->all(),$updateValidation->rules());

        $material = Material::where('user_id',Auth::id())->where('id',$id)->first();
        if($material) {
            if ($validate->fails()) {
                return $this->apiResponse($validate->errors(), 404);
            } else {
                $data = $request->all();

                if (!empty($data['file'])) {
                    $data['file'] = UploadFileTrait::updateFile($request->file('file'), 'material', 'file', $material->file);
                } else {
                    unset($data['file']);
                }

                $material->update($data);
                return $this->apiResponse('Material Update Successfully');
            }
        }else{
                return $this->apiResponse(null,'Material Note Found',404);
        }
    }

    public function destroy($id){
        $material = Material::where('user_id',Auth::id())->where('id',$id)->first();
        if(!$material){
            return $this->apiResponse('Material Note Found');
        }else{
            \File::Delete('media/files/material/' . $material->file);
            $material->delete();
            return $this->apiResponse('Material Deleted Successfully');
        }
    }
}
