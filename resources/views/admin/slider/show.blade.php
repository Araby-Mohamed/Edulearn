@extends('admin.layouts.app')
@section('title') slider @endsection
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
                <span class="caption-Event font-green-sharp bold uppercase"> Slider</span>
            </div>
        </div>
        @include('admin.layouts.message')
        <div class="portlet-body form">

                <div class="form-body">
                    <div class="form-group">
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-header"></i>
                            <input type="text" class="form-control" placeholder="Title" value="{{$slider->title}}" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="color: #666;">Content</label>
                        <textarea class="form-control" rows="6" data-error-container="#editor2_error" readonly>{{$slider->content}}</textarea>
                        <div id="editor2_error"> </div>
                    </div>

                    <div class="form-group">
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-header"></i>
                            <input type="text" class="form-control" value="{{$slider->button_title_1}}" maxlength="200" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-link"></i>
                            <input type="text" class="form-control" placeholder="Button Link 1" value="{{$slider->button_url_1}}" maxlength="200" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-header"></i>
                            <input type="text" class="form-control" placeholder="Button Title 2" value="{{$slider->button_title_2}}" maxlength="200" readonly>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-link"></i>
                            <input type="text" class="form-control" placeholder="Button Link 2" value="{{$slider->button_url_2}}" readonly maxlength="200">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="{{url('media/images/slider/'.$slider->image)}}" alt="" /> </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                            </div>
                            <div class="clearfix margin-top-10">

                        </div>
                    </div>
                </div>
                <div class="form-actions right"></div>

        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
@endsection

@section('js')
    <script src="{{url('/')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    {{--<script src="{{url('/')}}/assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>--}}
    <script src="{{url('/')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endsection
