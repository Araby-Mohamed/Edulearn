<?php

namespace App\Http\Controllers\Api\professor;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\ScoreResource;
use App\Model\Score;
use App\Model\Subject;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    use ApiResponseTrait;

    public function show($id){
        $score = ScoreResource::collection(Score::where('subject_id',$id)->paginate(20));
        if(!$score){
            return $this->apiResponse(null,'Score Not Found',404);
        }else{
            return $this->apiResponse($score);
        }

    }

    public function update(Request $request,$id){
        $validate = Validator::make($request->all(),[
            'score' => 'numeric|max:100|min:0'
        ]);

        if($validate->fails()){
            return $this->apiResponse(null,$validate->errors(),404);
        }else{
            $sc = Score::where('id',$id)->first();
            $data = $request->all();
            $sc->update($data);
            return $this->apiResponse('Score Updated Successfully');
        }

    }
}
