<?php

namespace App\Http\Controllers\Api\professor;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Requests\Front\QuestionBank\Store;
use App\Http\Requests\Front\QuestionBank\Update;
use App\Http\Resources\QuestionBankResources;
use App\Model\QuestionBank;
use App\Model\Subject;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionBankController extends Controller
{

    use ApiResponseTrait;

    public function store(Request $request){
        $validateStore = new Store();
        $validate = Validator::make($request->all(),$validateStore->rules());
        if($validate->fails()){
            return $this->apiResponse(null,$validate->errors(),404);
        }else{
            $data = $request->all();
            $data['user_id'] = Auth::id();
            QuestionBank::create($data);
            return $this->apiResponse('Added QuestionBank Successfully');
        }

    }

    public function show($id){
        $question_bank = QuestionBankResources::collection(QuestionBank::where('subject_id',$id)->paginate(100));
        if(!$question_bank){
            return $this->apiResponse(null,'Question Bank Bot Found',404);
        }else{
            return $this->apiResponse($question_bank);
        }
    }


    public function update(Request $request,$id){

        $data = $request->all();
        $question_bank = QuestionBank::where('user_id',Auth::id())->where('id',$id)->first();
        $validateUpdate = new Update();
        $validate = Validator::make($request->all(),$validateUpdate->rules());
        if (!$question_bank){
            return $this->apiResponse(null,'Question Bank Not Found',404);
        }else{
            if($validate->fails()){
                return $this->apiResponse(null,$validate->errors(),404);
            }else{
                $question_bank->update($data);
                return $this->apiResponse('Updated QuestionBank Successfully');
            }

        }
    }

    public function destroy($id){
        $question_bank = QuestionBank::where('user_id',Auth::id())->where('id',$id)->first();
        if(!$question_bank){
            return $this->apiResponse(null,'Question Bank Not Found',404);
        }else{
            $question_bank->delete();
            return $this->apiResponse('Deleted QuestionBank Successfully');
        }
    }
}
