@extends('admin.layouts.app')
@section('css')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{url('/')}}/assets/pages/css/faq.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('title')
    Question Bank
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
                        <span class="caption-subject bold uppercase">Question Bank</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="faq-content-container">
                    <div class="row">
                        @foreach($questions as $que)
                            <div class="col-md-6">
                            <div class="faq-section bordered">
                                <div class="panel-group accordion faq-content" id="accordion{{$que->id}}">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion{{$que->id}}" href="#collapse_{{$que->id}}"> {{$que->title}}</a>
                                                <span class="label label-sm label-success" style="position: absolute;right: 15px; top: 0"> Dr {{$que->user->first_name . ' ' . $que->user->last_name}} </span>
                                                <span class="label label-sm label-danger" style="position: absolute;right: 15px; top: 21px">{{$que->subject->name}} </span>
                                            </h4>
                                        </div>
                                        <div id="collapse_{{$que->id}}" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p> {{$que->answer}} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{$questions->links()}}
            <!-- END EXAMPLE TABLE PORTLET-->

        </div>
    </div>
@endsection
