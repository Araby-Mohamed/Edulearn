<?php

namespace App\Http\Controllers\Api\professor;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\UploadFileTrait;
use App\Http\Requests\Front\Exam\Store;
use App\Http\Requests\Front\Exam\Update;
use App\Http\Resources\ExamResource;
use App\Model\Exam;
use App\Model\Subject;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $exams = ExamResource::collection(Exam::where('user_id',Auth::id())->paginate(20));
        return $this->apiResponse($exams);
    }


    public function store(Request $request){
        $storeValidation = new Store();
        $validate = Validator::make($request->all(),$storeValidation->rules());

        if($validate->fails()){
            return $this->apiResponse(null,$validate->errors(),404);
        }else{
            $data = $request->all();
            $data['file'] = UploadFileTrait::storeFile($request->file('file'),'exam','file');
            $data['user_id'] = Auth::id();
            Exam::create($data);
            return $this->apiResponse('Exam Added Successfully');
        }

    }

    public function update(Request $request,$id){
        $updateValidation = new Update();
        $validate = Validator::make($request->all(),$updateValidation->rules());

        $exam = Exam::where('user_id',Auth::id())->where('id',$id)->first();

        if(!$exam){
            return $this->apiResponse(null,'Exam Not Found',404);
        }else{
            if($validate->fails()){
                return $this->apiResponse(null,$validate->errors(),404);
            }else{
                $data = $request->all();
                if(!empty($data['file'])){
                    $data['file'] = UploadFileTrait::updateFile($request->file('file'),'exam','file',$exam->file);
                }else{
                    unset($data['file']);
                }

                $exam->update($data);
                return $this->apiResponse('Exam Updated Successfully');
            }
        }

    }

    public function destroy($id){
        $exam = Exam::where('user_id',Auth::id())->where('id',$id)->first();
        if(!$exam)
           return $this->apiResponse(null,'Exam Not Found');

        \File::Delete('media/files/exam/'.$exam->file);
        $exam->delete();
        return $this->apiResponse('Exam Deleted Successfully');
    }
}
