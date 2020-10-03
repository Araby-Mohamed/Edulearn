<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\UploadFileTrait;
use App\Http\Requests\Front\Tasks\Store;
use App\Http\Requests\Front\Tasks\Update;
use App\Model\StudentTask;
use App\Model\Subject;
use App\Http\Controllers\Controller;
use App\Model\Task;
use Faker\Provider\DateTime;
use Faker\Provider\File;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::where('user_id',Auth::id())->paginate(20);
        return view('professor.tasks.index',compact('tasks'));
    }

    public function create(){
        $subject = Subject::where('user_id',Auth::id())->get();
        return view('professor.tasks.create',compact('subject'));
    }

    public function store(Store $request){
        $data = $request->all();
        $data['end_date'] = $request->day . '-' . $request->month . '-' . $request->year;
        $data['file'] = UploadFileTrait::storeFile($request->file('file'),'task','file');
        $data['user_id'] = Auth::id();

        $end_date = new \DateTime($data['end_date']);
        $today = new \DateTime(date('d-m-Y'));

        if($today > $end_date){
            session()->flash('danger','Please do not choose a previous date');
            return back();
        }

        Task::create($data);
        session()->flash('success','Task Added Successfully');
        return back();
    }

    public function edit($id){
        $task = Task::where('user_id',Auth::id())->where('id',$id)->first();
        if(!$task)
            abort(404);
        $subject = Subject::where('user_id',Auth::id())->get();
        $day = substr($task->end_date, 0, 2);
        $month = substr($task->end_date, 3, 2);
        $year = substr($task->end_date, 6, 4);


        return view('professor.tasks.edit',
            [
                'task'    => $task,
                'subject' => $subject,
                'days'    => $day,
                'months'  => $month,
                'years'   => $year
            ]
        );
    }

    public function update(Update $request,$id){
        $task = $task = Task::where('user_id',Auth::id())->where('id',$id)->first();
        if(!$task)
            abort(404);

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
            session()->flash('danger','Please do not choose a previous date');
            return back();
        }

//        return $data;

        $data['end_date'] = $request->day . '-' . $request->month . '-' . $request->year;


        $task->update($data);
        session()->flash('success','Task Updated Successfully');
        return back();
    }

    public function destroy($id){
        $task = Task::where('user_id',Auth::id())->where('id',$id)->first();
        if(!$task)
            abort(404);

        \File::Delete('media/files/task/'.$task->file);
        $task->delete();
        session()->flash('success','Task Deleted Successfully');
        return back();
    }

    public function uploadTask($id){
        $tasks = StudentTask::where('task_id',$id)->paginate(20);
        return view('professor.tasks.upload-task',compact('tasks'));
    }
}
