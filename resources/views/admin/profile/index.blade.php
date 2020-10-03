@extends('admin.layouts.app')
@section('title')
  Admins
@endsection
@section('css')
    <link href="{{url('/')}}/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>My Profile</h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet bordered">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img src="{{url('media/images/user.png')}}" class="img-responsive" alt=""> </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> {{auth()->guard('admin')->user()->username}} </div>
                                <div class="profile-usertitle-job"> {{ (auth()->guard('admin')->user()->lever == 2 || 1) ? 'Admin' : 'Employee'}} </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                        </div>
                        <!-- END PORTLET MAIN -->
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">My Profile</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        @include('admin.layouts.message')
                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="tab_1_1">
                                                <form role="form" method="post" action="{{url('admin/profile')}}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label class="control-label">Username</label>
                                                        <input type="text" placeholder="Username" name="username" value="{{auth()->guard('admin')->user()->username}}" class="form-control" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">First Name</label>
                                                        <input type="text" placeholder="First Name" name="first_name" value="{{auth()->guard('admin')->user()->first_name}}" class="form-control" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Last Name</label>
                                                        <input type="text" placeholder="Last Name" name="last_name" value="{{auth()->guard('admin')->user()->last_name}}" class="form-control" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Email</label>
                                                        <input type="email" placeholder="Email" name="email" value="{{auth()->guard('admin')->user()->email}}" class="form-control" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Mobile Number</label>
                                                        <input type="text" placeholder="Mobile Number" name="phone"  value="{{auth()->guard('admin')->user()->phone}}" class="form-control" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Password</label>
                                                        <input type="password" placeholder="Password" name="password" class="form-control" /> </div>
                                                    <div class="form-group">
                                                        <label>Select Gender</label>
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="gender" id="optionsRadios25" value="Male" {{ auth()->guard('admin')->user()->gender == 'Male' ? 'checked' : ''}} > Male
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="gender" id="optionsRadios26" value="Female" {{auth()->guard('admin')->user()->gender == 'Female' ? 'checked' : ''}} > Female
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="margiv-top-10">
                                                        <button type="submit" class="btn green">Submit</button>
                                                        <a onClick="window.location.reload()" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END PERSONAL INFO TAB -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->

@endsection
@section('js')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{url('/')}}/assets/pages/scripts/profile.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection
