@extends('admin.layouts.app')
@section('title') Add New Event @endsection
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
                <span class="caption-Event font-green-sharp bold uppercase">Edit Event</span>
            </div>
        </div>
        @include('admin.layouts.message')
        <div class="portlet-body form">
            <form action="{{url('admin/event',$event->id)}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="form-group">
                        <label style="margin-bottom:0; color: #666;">Title</label>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-header"></i>
                            <input type="text" class="form-control" placeholder="Title" value="{{$event->title}}" name="title" maxlength="200" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="color: #666;">Content</label>
                        <textarea class="ckeditor form-control" name="content" rows="6" data-error-container="#editor2_error">{{$event->content}}</textarea>
                        <div id="editor2_error"> </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="{{(!empty($event->image)) ? url('media/images/event/'.$event->image) : url('media/images/subject.png') }}" alt="" /> </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new"> Select image </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="image"> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                </div>
                            </div>
                            <div class="clearfix margin-top-10">
                                <span class="label label-danger">NOTE!</span> Max Size 150kb, Image Type Jpg,png,jpeg </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions right">
                    <a onClick="window.location.reload()" class="btn default">Cancel</a>
                    <button type="submit" class="btn green">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
@endsection

@section('js')
    <script src="{{url('/')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/global/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="{{url('/')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endsection
