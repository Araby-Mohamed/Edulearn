<?php

namespace App\Http\Controllers\Api\student;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\StudentResource;
use App\Http\Resources\UserResource;
use App\Model\Student;
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
        $student = new StudentResource(Student::where('user_id',$id)->first());
        return $this->apiResponse([$user,$student]);
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
