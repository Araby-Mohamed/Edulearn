<?php

namespace App\Http\Controllers\Api\professor;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\ProfessorResource;
use App\Http\Resources\UserResource;
use App\Model\Professor;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $id = Auth::id();
        $user = new UserResource(Auth::user());
        $professor = new ProfessorResource(Professor::where('user_id',$id)->first());
        return $this->apiResponse([$user,$professor]);
    }

    public function update(Request $request){
        $validate = Validator::make($request->all(),[
            'password' => 'required|min:6|max:50'
        ]);

        if($validate->fails()){
            return $this->apiResponse(null,$validate->errors(),404);
        }else{
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->password);
            $user->save();
            return $this->apiResponse('Profile Updated Successfully');
        }

    }
}
