<?php

namespace App\Http\Controllers\Api\professor;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\SubjectResource;
use App\Model\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $subject = SubjectResource::collection(Subject::where('user_id',Auth::id())->get());
        return $this->apiResponse($subject);
    }
}
