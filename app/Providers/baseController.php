<?php

namespace App\Providers;

use App\Model\Material;
use App\Model\QuestionBank;
use App\Model\Subject;
use App\Model\Task;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Mockery\Matcher\Closure;
use View;
class baseController extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*',function ($view){
            $students = User::where('level',1)->orderBy('id','DESC')->limit(5)->get();
            $professor = User::where('level',2)->get();
            // Get Count Subject
            $id = (Auth::user() ? Auth::user()->id : null);
            if($id != null){
                $subjectCount = Subject::where('user_id',Auth::user()->id)->get()->count();
                $subjectCountStudent = Subject::count();
                $materialCount = Material::where('user_id',Auth::user()->id)->get()->count();
                $taskCount = Task::where('user_id',Auth::user()->id)->get()->count();
                $taskCountStudent = Task::count();
                $questionBankCount = QuestionBank::where('user_id',Auth::id())->get()->count();
                $questionBankCountStudent = QuestionBank::count();
                $view->with('subjectCount', $subjectCount );
                $view->with('materialCount', $materialCount );
                $view->with('taskCount', $taskCount );
                $view->with('questionBankCount', $questionBankCount );
                $view->with('subjectCountStudent', $subjectCountStudent );
                $view->with('taskCountStudent', $taskCountStudent );
                $view->with('questionBankCountStudent', $questionBankCountStudent );
            }

            $view->with('students', $students );
            $view->with('professor', $professor );
            // Share
//            View::share([
//                'subjectCount' => $subjectCount,
//                'students'     => $students,
//            ]);
        });

    }





    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
