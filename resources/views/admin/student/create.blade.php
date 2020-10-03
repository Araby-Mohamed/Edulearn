@extends('admin.layouts.app')
@section('title') Add New Student @endsection
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
            <span class="caption-subject font-green-sharp bold uppercase">Add New Student</span>
        </div>
    </div>
    @include('admin.layouts.message')
    <div class="portlet-body form">
        <form action="{{url('admin/student')}}" method="post" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <div class="form-group">
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-id-card-o" aria-hidden="true"></i>
                        <input type="number" class="form-control" placeholder="SSN" value="{{old('ssn')}}" name="ssn" onKeyPress="if(this.value.length==14) return false;" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control" placeholder="First Name" value="{{old('first_name')}}" name="first_name" maxlength="20" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control" placeholder="Last Name" value="{{old('last_name')}}" name="last_name" maxlength="20" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-phone"></i>
                        <input type="tel" class="form-control" placeholder="Phone" value="{{old('phone')}}" name="phone" maxlength="14" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-envelope"></i>
                        <input type="email" class="form-control" placeholder="Email" value="{{old('email')}}"  name="email" maxlength="50" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <input type="text" class="form-control" placeholder="Address" value="{{old('address')}}"  name="address" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="-60y" data-date-end-date="-22y">
                        <input type="text" class="form-control" placeholder="Birth Date" name="birthDate" value="{{old('birthDate')}}" readonly>
                        <span class="input-group-btn">
                            <button class="btn default" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-key"></i>
                        <input type="password" class="form-control" placeholder="Password" name="password" maxlength="50" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Select Gender</label>
                        <div class="mt-radio-inline">
                            <label class="mt-radio">
                                <input type="radio" name="gender" id="optionsRadios25" value="Male" {{old('gender') == 'Male' ? 'checked' : ''}} > Male
                                <span></span>
                            </label>
                            <label class="mt-radio">
                                <input type="radio" name="gender" id="optionsRadios26" value="Female" {{old('gender') == 'Female' ? 'checked' : ''}} > Female
                                <span></span>
                            </label>
                        </div>
                </div>
                <div class="form-group">
                    <label>Select Subject</label>
                    <div class="mt-checkbox-inline">
                        @foreach($subject as $sub)
                            <label class="mt-checkbox">
                                <input type="checkbox" id="inlineCheckbox1" value="{{$sub->id}}" name="subject_id[]" {{ (in_array($sub->id,old('subject_id', []))) ? 'checked' : '' }}> {{$sub->name}}
                                <span></span>
                            </label>
                        @endforeach
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
@endsection
