@extends('admin.layouts.app')
@section('title')
  Home
@endsection

@section('content')
            <!-- END SIDEBAR -->

                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Edulearn Dashboard</h1>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="{{url('/admin')}}">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Dashboard</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{url('admin/student')}}">
                                <div class="visual">
                                    <i class="fa fa-graduation-cap"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$student_count}}">0</span>
                                    </div>
                                    <div class="desc"> Student </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="{{url('admin/professor')}}">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$professor_count}}">0</span> </div>
                                    <div class="desc"> Professor </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="{{url('admin/subject')}}">
                                <div class="visual">
                                    <i class="fa fa-book"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$subject_count}}">0</span>
                                    </div>
                                    <div class="desc"> Subject </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="{{url('admin/event')}}">
                                <div class="visual">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$event_count}}"></span></div>
                                    <div class="desc"> Event </div>
                                </div>
                            </a>
                        </div>
                    </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-comments"></i>New Student </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"> </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th> Phone </th>
                                        <th> First Name </th>
                                        <th> Last Name </th>
                                        <th> Email </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($new_student as $student)
                                    <tr>
                                        <td> <span class="label label-sm label-info">  {{$student->phone}} </span> </td>
                                        <td> {{$student->first_name}} </td>
                                        <td> {{$student->last_name}} </td>
                                        <td> {{$student->email}} </td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>

            </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->


@endsection
