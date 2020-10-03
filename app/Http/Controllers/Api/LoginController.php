<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\ProfessorResource;
use App\Http\Resources\StudentResource;
use App\Http\Resources\UserResource;
use App\Model\Professor;
use App\Model\Student;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    use ApiResponseTrait;

    // Login Api
    public function login(Request $request){
        $validate = Validator::make($request->all(),[
            'email'      => 'required|email',
            'password'   => 'required|min:5',
        ]);

        if($validate->fails()){
            return $this->apiResponse(null,$validate->errors(),404);
        }else{
            if(auth()->attempt(['email' => $request->email,'password' => $request->password])){
                $user = auth()->user();
                $user->api_token = sha1(date($request->email).mt_rand(1000,1000000));
                $user->save();
                $data = new UserResource(User::find($user->id));
                if($user->level == 1){
                    $student = new StudentResource(Student::where('user_id',Auth::id())->first());
                    return $this->apiResponse([$data,$student]);
                }else{
                    $professor = new ProfessorResource(Professor::where('user_id',Auth::id())->first());
                    return $this->apiResponse([$data,$professor]);
                }


            }else{
                return $this->apiResponse(null,'The Email Or Password Incorrect',404);
            }
        }
    }

    public function logout(){
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            $user->api_token = null;
            $user->save();
            return $this->apiResponse('Sign out successful',null,200);
        }else{
            return $this->apiResponse('','You are not registered',404);
        }
    }
}
