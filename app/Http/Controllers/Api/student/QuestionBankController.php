<?php

namespace App\Http\Controllers\Api\student;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\QuestionBankResources;
use App\Model\QuestionBank;
use App\Model\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionBankController extends Controller
{

    use ApiResponseTrait;

    public function show($id){
        $question_bank = QuestionBankResources::collection(QuestionBank::where('subject_id',$id)->paginate(100));
        if(!$question_bank){
            return $this->apiResponse(null,'Question Bank Not Found',404);
        }else{
            return $this->apiResponse($question_bank);
        }
    }
}
