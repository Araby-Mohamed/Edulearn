<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UploadFileTrait;
use App\Http\Requests\Back\Student\Store;
use App\Http\Requests\Back\Student\Update;
use App\Model\Score;
use App\Model\Student;
use App\Model\Subject;
use App\User;
use Faker\Provider\DateTime;
use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    use UploadFileTrait;

    public function index()
    {
        $user = User::where('level',1)->get();
        return view('admin.student.index',compact('user'));
    }

    public function create()
    {
        $subject = Subject::all();
        return view('admin.student.create',compact('subject'));
    }


    public function store(Store $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->input('password'));
        $data['image'] = UploadFileTrait::storeFile($request->file('image'),'student','image');
        $data['level'] = 1;
        // Save User
        $user = User::create($data);


        // Student
        $student = new Student();
        // Max StdNumber
        $maxNumber = Student::max('stdNumber') + 1;
        if($maxNumber == 1){
            $student->stdNumber = date('Y') . '00001';
        }else{
            $student->stdNumber = $maxNumber;
        }

        //return Age;
        $dateOfBirth = $user->birthDate;
        $age = Carbon::parse($dateOfBirth)->age;
        $student->age = $age;

        $student->user_id = $user->id;

        // Save Student
        $student->save();


        // Score
        $score = $request->input('subject_id');
        for ($i=0; $i < count($score); $i++){
            $student_score[] = [
                'score' => 0,
                'user_id' => $user->id,
                'subject_id' => $score[$i]
            ];
        }

        // Store Score
        Score::insert($student_score);

        session()->flash('success','Student Added Successfully');
        return back();

    }


    public function show($id)
    {
        // Get Student
        $user = User::where('level',1)->where('id',$id)->first();
        // Get Student Details
        $student = Student::where('user_id',$id)->first();

        if(!$user)
            abort(404);

        return view('admin.student.show',compact('user','student'));
    }


    public function edit($id)
    {
        // Subject
        $subject = Subject::all();
        // Subject Different
        $subjectDef = Subject::all('id','name');

        // Score
        $score = Score::where('user_id',$id)->get();
        // Score Different
        $scoreDef = Score::select('subject_id as id')->where('user_id',$id)->get();

        // Get Different Two Object
        $diff = $subjectDef->diff($scoreDef);

        // Get Student
        $user = User::where('level',1)->where('id',$id)->first();
        // Get Student Details
        $student = Student::where('user_id',$id)->first();

        if(!$user)
            abort(404);

        return view('admin.student.edit',compact('user','student','subject','score','diff'));
    }


    public function update(Update $request, $id)
    {
        $user = User::where('level',1)->where('id',$id)->first();

        if(!$user)
            abort(404);

        $data = $request->all();

        if(!empty($data['image'])){
            $data['image'] = UploadFileTrait::updateFile($request->file('image'),'student','image',$user->image);
        }else{
            unset($data['image']);
        }

        if(!empty($data['password'])){
            $data['password'] = bcrypt($request->input('password'));
        }else{
            unset($data['password']);
        }

        $data2 = [
            $user->gender = $request->input('gender')
        ];

        //return $data;
        $user->update($data,$data2);


        $student = Student::where('user_id',$id)->first();
        //return Age;
        $dateOfBirth = $user->birthDate;
        $age = Carbon::parse($dateOfBirth)->age;

        $student->age = $age;
        $student->save();

        // Score
        $score = $request->input('subject_id');
        if(!empty($score)){
            for ($i=0; $i < count($score); $i++){
                $student_score[] = [
                    'score' => 0,
                    'user_id' => $user->id,
                    'subject_id' => $score[$i]
                ];
            }

            // Store Score
            Score::insert($student_score);
        }

        session()->flash('success','Student Updated Successfully');
        return back();
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $user = User::where('level', 1)->where('id', $id)->first();

            if (!$user)
                abort(404);

            \File::Delete('media/images/student/' . $user->image);

            $user->delete();
            session()->flash('success', 'Student Deleted Successfully');
            return back();
        }else{
            return back();
        }

    }

    public function score($id){
        $score = Score::where('user_id',$id)->get();
        $student = Student::where('user_id',$id)->first();

        $user = User::find($id);
        if(!$score)
            abort(404);

        return view('admin.student.score',compact('score','user','student'));
    }
}
