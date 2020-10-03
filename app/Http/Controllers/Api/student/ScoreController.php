<?php

namespace App\Http\Controllers\Api\student;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\ScoreResource;
use App\Http\Resources\StudentResource;
use App\Model\Score;
use App\Model\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $score = ScoreResource::collection(Score::where("user_id",Auth::id())->get());
        $studentNumber = new StudentResource(Student::where('user_id',Auth::id())->first());
        return $this->apiResponse([$score,$studentNumber]);
    }
}
