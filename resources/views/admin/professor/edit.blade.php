@extends('admin.layouts.app')
@section('title') Edit Professor @endsection
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
            <span class="caption-subject font-green-sharp bold uppercase">Edit Professor</span>
        </div>
    </div>
    @include('admin.layouts.message')
    <div class="portlet-body form">
        {{--<form action="{{url('admin/Professor/update',$Professor->id)}}" method="post" role="form">--}}
        <form action="{{url('admin/professor',$user->id)}}" method="post" enctype="multipart/form-data" role="form">
            @csrf
            @method('PUT')
            <div class="form-body">
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">SSN</label>
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-id-card-o" aria-hidden="true"></i>
                        <input type="number" class="form-control" value="{{$user->ssn}}" name="ssn" placeholder="SSN" onKeyPress="if(this.value.length==14) return false;">
                    </div>
                </div>

                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">First Name</label>
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control" value="{{$user->first_name}}" name="first_name" placeholder="First Name">
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">Last Name</label>
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control" value="{{$user->last_name}}" name="last_name" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">Phone</label>
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-phone"></i>
                        <input type="tel" class="form-control" value="{{$user->phone}}" name="phone" placeholder="Phone">
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">Email</label>
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-envelope"></i>
                        <input type="email" class="form-control" value="{{$user->email}}" name="email"  placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">Address</label>
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <input type="text" class="form-control" value="{{$user->address}}" name="address" placeholder="Address">
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">Professor Degree</label>
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-university" aria-hidden="true"></i>
                        <input type="text" class="form-control" placeholder="Professor Degree" value="{{$prof->pro_degree}}"  name="pro_degree" maxlength="150">
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">Password</label>
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-key"></i>
                        <input type="password" class="form-control" placeholder="Password" name="password" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label style="color: #666;">Birth Date</label>
                    <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="-60y" data-date-end-date="-22y">
                        <input type="text" class="form-control" value="{{$user->birthDate}}" name="birthDate" placeholder="Birth Date" readonly>
                        <span class="input-group-btn">
                            <button class="btn default" type="button">
                                <i class="fa fa-calendar"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">Gender</label>
                    <div class="mt-radio-inline">
                        <label class="mt-radio">
                            <input type="radio" name="gender" id="optionsRadios25" value="Male" {{$user->gender == 'Male' ? 'checked' : ''}}  > Male
                            <span></span>
                        </label>
                        <label class="mt-radio">
                            <input type="radio" name="gender" id="optionsRadios26" value="Female" {{$user->gender == 'Female' ? 'checked' : ''}} > Female
                            <span></span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label style="color: #666;">Image</label>
                    <div class="col-md-12">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                @if($user->image != null)
                                    <img src="{{url('media/images/professor/'.$user->image)}}" alt="" />
                                @else
                                    <img src="{{url('media/images/user.png')}}" alt="" />
                                @endif
                            </div>
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
