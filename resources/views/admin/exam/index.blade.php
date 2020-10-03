@extends('admin.layouts.app')
@section('title')
    Exam
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    @include('admin.layouts.message')
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Exam</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Professor</th>
                            <th>Subject</th>
                            <th>File</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Professor</th>
                            <th>Subject</th>
                            <th>File</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($exam as $ex)
                            <tr>
                                <td>{{$ex->title}}</td>
                                <td>{{$ex->user->first_name . ' ' . $ex->user->last_name}}</td>
                                <td>{{$ex->subject->name}}</td>
                                <td><a href="{{url('media/files/exam/'.$ex->file)}}" target="_blank"  class="btn green"><i class="fa fa-eye"></i> View</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->

        </div>
    </div>
@endsection
