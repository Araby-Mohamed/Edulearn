<?php

namespace App\Http\Controllers\Student;

use App\Model\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::orderBy('id','DESC')->paginate(20);
        return view('student.home',compact('events'));
    }
}
