<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UploadFileTrait;
use App\Http\Requests\Back\Events\Store;
use App\Http\Requests\Back\Events\Update;
use App\Model\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{

    use UploadFileTrait;

    public function index()
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $events = Events::all();
            return view('admin.events.index', compact('events'));
        }else{
            return redirect()->back();
        }
    }


    public function create()
    {
        if (Auth::guard('admin')->user()->level != 3) {
            return view('admin.events.create');
        }else{
            return redirect()->back();
        }
    }


    public function store(Store $request)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $data = $request->all();
            $data['admin_id'] = auth()->guard('admin')->user()->id;
            $data['image'] = UploadFileTrait::storeFile($request->file('image'), 'event', 'image');
            Events::create($data);
            session()->flash('success', 'Event Added Successfully');
            return back();
        }else{
            return redirect()->back();
        }
    }


    public function show($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $event = Events::find($id);

            if (!$event)
                abort(404);

            return view('admin.events.show', compact('event'));
        }else{
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $event = Events::find($id);

            if (!$event)
                abort(404);

            return view('admin.events.edit', compact('event'));
        }else{
            return redirect()->back();
        }
    }


    public function update(Update $request, $id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $event = Events::find($id);

            if (!$event)
                abort(404);

            $data = $request->all();
            $data['image'] = UploadFileTrait::updateFile($request->file('image'), 'event', 'image', $event->image);
            $event->update($data);
            session()->flash('success', 'Event Updated Successfully');
            return back();
        }else{
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $event = Events::find($id);

            if (!$event)
                abort(404);

            \File::Delete('media/images/event/' . $event->image);
            $event->delete();
            session()->flash('success', 'Event Deleted Successfully');
            return back();
        }else{
            return redirect()->back();
        }
    }
}
