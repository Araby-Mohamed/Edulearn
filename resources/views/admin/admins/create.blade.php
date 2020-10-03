@extends('admin.layouts.app')
@section('title') Add New Admin @endsection
@section('content')
<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-bubble font-green-sharp"></i>
            <span class="caption-subject font-green-sharp bold uppercase">Add New Admin</span>
        </div>
    </div>
    @include('admin.layouts.message')
    <div class="portlet-body form">
        <form action="{{url('admin/admins/store')}}" method="post" role="form">
            @csrf
            <div class="form-body">
                <div class="form-group">
                    <div class="input-icon margin-top-10">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control" placeholder="Username" value="{{old('username')}}" name="username" maxlength="20" required>
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
