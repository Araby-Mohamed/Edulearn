<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UploadFileTrait;
use App\Http\Requests\Back\Slider\Store;
use App\Http\Requests\Back\Slider\Update;
use App\Model\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{

    use UploadFileTrait;

    public function index()
    {
        if(Auth::guard('admin')->user()->level != 3){
            $slider = Slider::all();
            return view('admin.slider.index',compact('slider'));
        }else{
            return redirect()->back();
        }

    }


    public function create()
    {
        if (Auth::guard('admin')->user()->leve != 3){
            return view('admin.slider.create');
        }else{
            return redirect()->back();
        }
    }


    public function store(Store $request)
    {
        if(Auth::guard('admin')->user()->level != 3){
            $data = $request->all();
            $data['image'] = UploadFileTrait::storeFile($request->file('image'),'slider','image');
            Slider::create($data);
            session()->flash('success','Slider Added Successfully');
            return back();
        }else{
            redirect()->back();
        }
    }

    public function show($id)
    {
        if (Auth::guard('admin')->user()->level != 3){
            $slider = Slider::find($id);
            return view('admin.slider.show',compact('slider'));
        }else{
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        if (Auth::guard('admin')->user()->level != 3){
            $slider = Slider::find($id);
            return view('admin.slider.edit',compact('slider'));
        }else{
            return redirect()->back();
        }
    }


    public function update(Update $request, $id)
    {
        if (Auth::guard('admin')->user()->level != 3) {
            $slider = Slider::find($id);
            $data = $request->all();
            $data['image'] = UploadFileTrait::updateFile($request->file('image'), 'slider', 'image', $slider->image);
            $slider->update($data);
            session()->flash('success', 'Slider Updated Successfully');
            return back();
        }else{
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        if(Auth::guard('admin')->user()->level != 3){
            $slider = Slider::find($id);
            \File::Delete('media/images/slider/'.$slider->image);
            $slider->delete();
            session()->flash('success', 'Slider Deleted Successfully');
            return back();
        }else{
            return redirect()->back();
        }
    }
}
