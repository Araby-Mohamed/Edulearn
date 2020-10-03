@extends('student.layouts.app')
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
    @php
        $end_date = new \DateTime($task->end_date);
        $today = new \DateTime(date('d-m-Y'));
        $upload = \App\Model\StudentTask::where('user_id',auth()->user()->id)->where('subject_id',$task->subject->id)->where('task_id',$task->id)->first();
    @endphp
    @if($today > $end_date)
    <style>
        .expired{
            border-color: #d9534f;
        }

        .panel-heading-expired{
            background-color: #d9534f !important;
            border-color: #d9534f !important;
        }

        .btn-expired{
            color: #d9534f;
        }
    </style>
    @endif
    <div class="col-sm-12">
        <div class="panel panel-primary {{($today > $end_date) ? 'expired' : ''}} ">
            <div class="panel-heading {{($today > $end_date) ? 'panel-heading-expired' : ''}} ">
                <h3 class="panel-title">{{$task->title}}
                    <span class="label label-warning" style="float: right;font-size: 12px;margin-top: 2px;">{{$task->subject->name}}</span>
                </h3>
            </div>
            <p style="margin: 0;margin-left: 12px;margin-top: 8px"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$task->created_at->diffForHumans()}} <span class="label label-danger" style="float: right;margin-top: 6px;margin-right: 10px;">Expire: {{$task->end_date}}</span></p>
            @if(!empty($task->content))
            <div class="panel-body">
                {{$task->content}}
            </div>
            @endif
            <a href="{{url('media/files/task/'.$task->file)}}" target="_blank" class="{{($today > $end_date) ? 'btn-expired' : ''}} " style="display: inline-flex;padding: 5px;">
                <img src="{{url('assets_front\images\pdf.png')}}" style="width: 64px; margin-bottom: 0;" class="thumbnail"> <span style="margin-left: 5px;line-height: 60px;font-weight: bold;">Download File</span>
            </a>

            @if($today < $end_date)
                @if(!empty($upload))
                    <button type="button" style="position: absolute;right: 20px;bottom: 31px;background: #231f20;border-color: #231f20;" class="btn btn-info btn-sm" disabled>You already uploaded this task</button>
                    <a href="{{url('media/files/student-task/'.$upload->file)}}" target="_blank" style="position: absolute;right: 35%;bottom: 31px;background: #03979d;border-color: #03979d;" class="btn btn-info btn-sm">Show your task</a>
                @else
                    <button type="button" style="position: absolute;right: 20px;bottom: 31px;background: #231f20;border-color: #231f20;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal-{{$task->id}}">Upload Task</button>
                @endif
            @endif
        </div>
    </div>
    @endforeach
    @else
        <h4 style="text-align: center;    font-weight: bold;">There are no tasks</h4>
    @endif
    {{$tasks->links()}}

    @if($tasks->count() > 0)
        @foreach($tasks as $task)
    <!-- Modal -->
    @if($today < $end_date)
            <div class="modal fade" id="myModal-{{$task->id}}" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload Task ({{$task->title}})</h4>
                </div>
                <div class="modal-body">
                    <form action="{{url('student/task/upload',$task->id)}}" method="post" enctype="multipart/form-data" id="form-score">
                        @csrf
                        <div class="form-group">
                            <input type="file"  name="file" class="form-control">
                            <input type="hidden" name="subject_id" value="{{$task->subject->id}}">
                            <input type="hidden" name="task_id" value="{{$task->id}}">
                        </div>
                        <button type="submit" class="btn btn-primary" id="button-score">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    @endif
        @endforeach
    @endif
@endsection