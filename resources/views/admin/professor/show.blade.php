@extends('admin.layouts.app')
@section('title') Professor @endsection
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
                <span class="caption-subject font-green-sharp bold uppercase">Professor</span>
            </div>
        </div>
        @include('admin.layouts.message')
        <div class="portlet-body form">
                <div class="form-body">
                    <div class="form-group">
                        <label style="margin-bottom: 0;color: #666;">SSN</label>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-id-card-o" aria-hidden="true"></i>
                            <input type="number" class="form-control" value="{{$user->ssn}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="margin-bottom: 0;color: #666;">First Name</label>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" value="{{$user->first_name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="margin-bottom: 0;color: #666;">Last Name</label>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" value="{{$user->last_name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="margin-bottom: 0;color: #666;">Phone</label>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-phone"></i>
                            <input type="tel" class="form-control" value="{{$user->phone}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="margin-bottom: 0;color: #666;">Email</label>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-envelope"></i>
                            <input type="email" class="form-control" value="{{$user->email}}"  readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="margin-bottom: 0;color: #666;">Address</label>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <input type="text" class="form-control" value="{{$user->address}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="margin-bottom: 0;color: #666;">Professor Degree</label>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-university" aria-hidden="true"></i>
                            <input type="text" class="form-control" value="{{$professor_degree->pro_degree}}"  readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="color: #666;">Birth Date</label>
                        <div class="input-group input-medium date date-picker">
                            <input type="text" class="form-control" value="{{$user->birthDate}}" readonly>
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
                                <input type="radio" name="gender" id="optionsRadios25" value="Male" {{$user->gender == 'Male' ? 'checked' : ''}} disabled > Male
                                <span></span>
                            </label>
                            <label class="mt-radio">
                                <input type="radio" name="gender" id="optionsRadios26" value="Female" {{$user->gender == 'Female' ? 'checked' : ''}} disabled> Female
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
                            </div>
                        </div>
                    </div>
                </div>
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
                <a href="{{url('admin/professor/'.$user->id.'/edit')}}" class="active">
                    <span>Edit</span>
                    <i class="icon-note"></i>
                </a>
            </li>
            <li>
                <a href="{{url('admin/professor/create')}}">
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
