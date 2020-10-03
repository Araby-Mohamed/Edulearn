@extends('professor.layouts.app')
@section('content')
    <!-- Post Create Box  -->
    <div class="create-post">
        <div class="row">
            <img src="{{url('assets_front')}}/images/Exam-tips_resized-1-700x300-1.jpg" alt="" class="img-responsive post-image" />
        </div>
    </div><!-- Post Create Box End-->
    <!-- Post Content
    ================================================= -->
    @include('professor.layouts.message')
    @if($exams->count() > 0)
    @foreach($exams as $exam)
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{$exam->title}}
                    <span class="label label-warning" style="float: right;font-size: 12px;margin-top: 2px;">{{$exam->subject->name}}</span>
                    <a href="{{url('exam/delete/'.$exam->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><span class="label label-danger" style="margin-left: 5px;"><i class="fa fa-trash-o" aria-hidden="true"></i></span></a>
                    <a href="{{url('exam/edit/'.$exam->id)}}"><span class="label label-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
                </h3>
            </div>
            <a href="{{url('media/files/exam/'.$exam->file)}}" target="_blank" style="display: inline-flex;padding: 5px;">
                <img src="{{url('assets_front\images\pdf.png')}}" style="width: 64px; margin-bottom: 0;" class="thumbnail"> <span style="margin-left: 5px;line-height: 60px;font-weight: bold;">Download File</span>
            </a>
        </div>
    </div>
    @endforeach
    @else
        <h4 style="text-align: center;    font-weight: bold;">There are no exams</h4>
    @endif
    {{$exams->links()}}
@endsection