@extends('admin.layouts.app')
@section('title') Lecture Table @endsection
@section('css')
    <link href="{{url('/')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-bubble font-green-sharp"></i>
                <span class="caption-subject font-green-sharp bold uppercase">{{$table->title}}</span>
            </div>
        </div>
        @include('admin.layouts.message')
        <div class="portlet-body form">
            <img src="{{url('media/images/lecture_table/'.$table->image)}}" class="thumbnail">
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
    <!-- BEGIN QUICK NAV -->
    <nav class="quick-nav">
        <a class="quick-nav-trigger" href="#0">
            <span aria-hidden="true"></span>
        </a>
        <ul>
            <li>
                <a href="{{url('admin/table/'.$table->id.'/edit')}}" class="active">
                    <span>Edit</span>
                    <i class="icon-note"></i>
                </a>
            </li>
            <li>
                <a href="{{url('admin/table/create')}}">
                    <span>Add New</span>
                    <i class="icon-plus"></i>
                </a>
            </li>

        </ul>
        <span aria-hidden="true" class="quick-nav-bg"></span>
    </nav>
@endsection

@section('js')
    <script src="{{url('/')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endsection
