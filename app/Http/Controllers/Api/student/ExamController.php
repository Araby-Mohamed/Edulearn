<?php

namespace App\Http\Controllers\Api\student;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\ExamResource;
use App\Model\Exam;
use App\Model\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{

    use ApiResponseTrait;

    public function index(){
        $exams = ExamResource::collection(Exam::paginate(20));
        return $this->apiResponse($exams);
    }
}
