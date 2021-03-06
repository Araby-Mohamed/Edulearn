@extends('admin.layouts.app')
@section('title') Employee @endsection
@section('content')
<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-bubble font-green-sharp"></i>
            <span class="caption-subject font-green-sharp bold uppercase">Employee</span>
        </div>
    </div>
    @include('admin.layouts.message')
    <div class="portlet-body form">
            <div class="form-body">
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">Username</label>
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control" placeholder="Username" value="{{$employee->username}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">First Name</label>
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control" placeholder="First Name" value="{{$employee->first_name}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">Last Name</label>
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control" placeholder="Last Name" value="{{$employee->last_name}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">Phone</label>
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-phone"></i>
                        <input type="tel" class="form-control" placeholder="Phone" value="{{$employee->phone}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">Email</label>
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-envelope"></i>
                        <input type="email" class="form-control" placeholder="Email" value="{{$employee->email}}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-bottom: 0;color: #666;">Gender</label>
                        <div class="mt-radio-inline">
                            <label class="mt-radio">
                                <input type="radio" name="gender" id="optionsRadios25" value="Male" {{$employee->gender == 'Male' ? 'checked' : ''}} disabled> Male
                                <span></span>
                            </label>
                            <label class="mt-radio">
                                <input type="radio" name="gender" id="optionsRadios26" value="Female" {{$employee->gender == 'Female' ? 'checked' : ''}} disabled> Female
                                <span></span>
                            </label>
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
            <a href="{{url('admin/employee/'.$employee->id.'/edit')}}" class="active">
                <span>Edit</span>
                <i class="icon-note"></i>
            </a>
        </li>
        <li>
            <a href="{{url('admin/employee/create')}}">
                <span>Add New</span>
                <i class="icon-plus"></i>
            </a>
        </li>

    </ul>
    <span aria-hidden="true" class="quick-nav-bg"></span>
</nav>
@endsection
