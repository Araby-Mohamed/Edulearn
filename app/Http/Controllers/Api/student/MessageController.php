<?php

namespace App\Http\Controllers\Api\student;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\MessageResource;
use App\Model\Message;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    use ApiResponseTrait;

    public function show($id)
    {
        $message = MessageResource::collection(Message::where('from_user', Auth::id())->orWhere('to_user', Auth::id())->get());
        $professor = User::where('level', 2)->where('id', $id)->first();
        if(!$professor){
            return $this->apiResponse(null,'Professor not Found',404);
        }else{
            return $this->apiResponse($message);
        }

    }

    public function store(Request $request,$id)
    {
        $data = $request->all();
        $data['from_user'] = Auth::id();
        $data['to_user'] = $id;
        Message::create($data);
        return $this->apiResponse('Message Added Successfully');

    }
}
