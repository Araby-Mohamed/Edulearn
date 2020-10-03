@extends('professor.layouts.app')
@section('css')
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #03979d;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #03979d;
            color: #fff;
        }
    </style>
@endsection
@section('content')
    <!-- Post Create Box  -->
    <div class="create-post">
        <div class="row">
            <img src="{{url('assets_front')}}/images/3671.jpg" alt="" class="img-responsive post-image" />
        </div>
    </div><!-- Post Create Box End-->
    <!-- Post Content
    ================================================= -->
        <!-- Start Content -->
        <div class="faq-headline">
            <h3 class="item-title grey"><i class="icon ion-ios-information-outline"></i>Student answers to the task</h3>
        </div>
        @include('professor.layouts.message')
    @if($tasks->count() > 0)
        <table>
            <tr>
                <th>Student Name</th>
                <th>File</th>
            </tr>
            @foreach($tasks as $task)
                <tr id="score-table">
                    <td>{{$task->user->first_name . ' ' . $task->user->last_name }}</td>
                    <td><a href="{{url('media/files/student-task/'.$task->file)}}" target="_blank" class="btn-sm btn-warning"><i class="fa fa-folder"></i> Open File</a></td>
                </tr>
            @endforeach

        </table>
    @else
        <h4 style="text-align: center;    font-weight: bold;">There are no tasks</h4>
    @endif
    {{$tasks->links()}}
@endsection