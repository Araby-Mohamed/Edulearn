@extends('professor.layouts.app')
@section('content')
    <!-- Post Create Box  -->
    <div class="create-post">
        <div class="row">
            <img src="{{url('assets_front')}}/images/3671.jpg" alt="" class="img-responsive post-image" />
        </div>
    </div><!-- Post Create Box End-->
    <!-- Post Content
    ================================================= -->
    @include('professor.layouts.message')
    @if($tasks->count() > 0)
    @foreach($tasks as $task)
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{$task->title}}
                    <span class="label label-warning" style="float: right;font-size: 12px;margin-top: 2px;">{{$task->subject->name}}</span>
                    <a href="{{url('task/delete/'.$task->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><span class="label label-danger" style="margin-left: 5px;"><i class="fa fa-trash-o" aria-hidden="true"></i></span></a>
                    <a href="{{url('task/edit/'.$task->id)}}"><span class="label label-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
                    <a href="{{url('task/student/'.$task->id)}}"><span class="label label-warning"><i class="fa fa-user" aria-hidden="true"></i></span></a>
                </h3>
            </div>
            <p style="margin: 0;margin-left: 12px;margin-top: 8px"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$task->created_at->diffForHumans()}} <span class="label label-danger" style="float: right;margin-top: 6px;margin-right: 10px;">Expire: {{$task->end_date}}</span></p>
            @if(!empty($task->content))
            <div class="panel-body">
                {{$task->content}}
            </div>
            @endif
            <a href="{{url('media/files/task/'.$task->file)}}" target="_blank" style="display: inline-flex;padding: 5px;">
                <img src="{{url('assets_front\images\pdf.png')}}" style="width: 64px; margin-bottom: 0;" class="thumbnail"> <span style="margin-left: 5px;line-height: 60px;font-weight: bold;">Download File</span>
            </a>
        </div>
    </div>
    @endforeach
    @else
        <h4 style="text-align: center;    font-weight: bold;">There are no tasks</h4>
    @endif
    {{$tasks->links()}}
@endsection