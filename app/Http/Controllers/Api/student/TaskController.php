<?php

namespace App\Http\Controllers\Api\student;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\UploadFileTrait;
use App\Http\Resources\TaskResources;
use App\Model\StudentTask;
use App\Model\Task;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $tasks = TaskResources::collection(Task::paginate(20));
        return $this->apiResponse($tasks);
    }


    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'file'    => 'required|file|mimes:pdf|max:3000',
        ]);

        if($validate->fails()){
            return $this->apiResponse(null,$validate->errors(),404);
        }else{
            $data = $request->all();
            $data['file'] = UploadFileTrait::storeFile($request->file('file'),'student-task','file');
            $data['user_id'] = Auth::id();
            StudentTask::create($data);
            return $this->apiResponse('Task Uploaded Successfully');
        }

    }
}
