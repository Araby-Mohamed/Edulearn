<?php

namespace App\Http\Controllers\Api\student;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\SubjectResource;
use App\Model\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $subject = SubjectResource::collection(Subject::paginate(20));
        return $this->apiResponse($subject);
    }
}
