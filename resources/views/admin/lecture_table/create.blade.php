@extends('admin.layouts.app')
@section('title') Add New Lecture Table @endsection
@section('css')
    <link href="{{url('/')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{url('/')}}/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
@endsection
@section('content')
<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-bubble font-green-sharp"></i>
            <span class="caption-subject font-green-sharp bold uppercase">Add New Lecture Table</span>
        </div>
    </div>
    @include('admin.layouts.message')
    <div class="portlet-body form">
        <form action="{{url('admin/table')}}" method="post" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <div class="form-group">
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-header"></i>
                        <input type="text" class="form-control" placeholder="Title" value="{{old('title')}}" name="title" maxlength="150" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new"> Select image </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="image" required> </span>
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
    <script src="{{url('/')}}/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
@endsection
