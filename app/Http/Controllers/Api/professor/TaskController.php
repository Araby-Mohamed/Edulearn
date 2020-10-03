<?php

namespace App\Http\Controllers\Api\professor;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Controllers\UploadFileTrait;
use App\Http\Requests\Front\Tasks\Store;
use App\Http\Requests\Front\Tasks\Update;
use App\Http\Resources\TaskResources;
use App\Http\Resources\TaskStudentResources;
use App\Model\StudentTask;
use App\Model\Subject;
use App\Model\Task;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $tasks = TaskResources::collection(Task::where('user_id',Auth::id())->paginate(20));
        return $this->apiResponse($tasks);
    }


    public function store(Request $request){

        $validationStore = new Store();
        $validate = Validator::make($request->all(),$validationStore->rules());
        if($validate->fails()){
            return $this->apiResponse(null,$validate->errors(),404);
        }else{
            $data = $request->all();
            $data['end_date'] = $request->day . '-' . $request->month . '-' . $request->year;
            $data['file'] = UploadFileTrait::storeFile($request->file('file'),'task','file');
            $data['user_id'] = Auth::id();

            $end_date = new \DateTime($data['end_date']);
            $today = new \DateTime(date('d-m-Y'));

            if($today > $end_date){
                return $this->apiResponse(null,'Please do not choose a previous date',404);
            }

            Task::create($data);
            return $this->apiResponse('Task Added Successfully');
        }

    }


    public function update(Request $request,$id){

        $task = $task = Task::where('user_id',Auth::id())->where('id',$id)->first();

        if(!$task){
            return $this->apiResponse(null,'Task Not Found',404);
        }else{
            $validateUpdate = new Update();
            $validate = Validator::make($request->all(),$validateUpdate->rules());

            if($validate->fails()){
                return $this->apiResponse(null,$validate->errors(),404);
            }else{

                $data = $request->all();
            $file = $request->file('file');

            if(!empty($file)){
                $file = UploadFileTrait::updateFile($request->file('file'),'task','file',$task->file);
                $data['file'] = $file;
            }else{
                unset($file);
            }

                $expire = $request->day . '-' . $request->month . '-' . $request->year;
                $end_date = new \DateTime($expire);
                $today = new \DateTime(date('d-m-Y'));

                if($today > $end_date){
                    return $this->apiResponse(null,'Please do not choose a previous date',404);
                }

                $data['end_date'] = $request->day . '-' . $request->month . '-' . $request->year;

                $task->update($data);

                return $this->apiResponse('Task Updated Successfully');
            }
        }
    }

    public function destroy($id){
        $task = Task::where('user_id',Auth::id())->where('id',$id)->first();
        if(!$task){
            return $this->apiResponse(null,'Task Not Found',404);
        }else{
            \File::Delete('media/files/task/'.$task->file);
            $task->delete();
            return $this->apiResponse('Task Deleted Successfully');
        }
    }

    public function uploadTask($id){
        $tasks = TaskStudentResources::collection(StudentTask::where('task_id',$id)->paginate(20));
        return $this->apiResponse($tasks);
    }
}
