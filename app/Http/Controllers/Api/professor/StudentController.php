<?php

namespace App\Http\Controllers\Api\professor;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $student = UserResource::collection(User::where('level',1)->paginate(20));
        return $this->apiResponse($student);
    }
}
