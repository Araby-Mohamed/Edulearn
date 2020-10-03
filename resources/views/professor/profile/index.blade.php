@extends('professor.layouts.app')
@section('css')
<style>
    .static {
        margin-top: 100px;
    }
</style>
@endsection
@section('cover')
    <div class="container">

        <!-- Timeline
        ================================================= -->
        <div class="timeline">
            <div class="timeline-cover">

                <!--Timeline Menu for Large Screens-->
                <div class="timeline-nav-bar hidden-sm hidden-xs">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile-info">
                                <img src="{{(!empty(auth()->user()->image) ? url('media/images/professor/'.auth()->user()->image) : url('media/images/user.png') )}}" alt="" class="img-responsive profile-photo" />
                                <h3>{{auth()->user()->first_name . ' ' .auth()->user()->last_name}}</h3>
                                <p class="text-muted">Professor</p>
                            </div>
                        </div>
                        @include('professor.layouts.menu_profile')
                    </div>
                </div><!--Timeline Menu for Large Screens End-->

                <!--Timeline Menu for Small Screens-->
                <div class="navbar-mobile hidden-lg hidden-md">
                    <div class="profile-info">
                        <img src="http://placehold.it/300x300" alt="" class="img-responsive profile-photo" />
                        <h4>Sarah Cruiz</h4>
                        <p class="text-muted">Creative Director</p>
                    </div>
                    <div class="mobile-menu">
                        <ul class="list-inline">
                            <li><a href="timline.html">Timeline</a></li>
                            <li><a href="timeline-about.html" class="active">About</a></li>
                            <li><a href="timeline-album.html">Album</a></li>
                            <li><a href="timeline-friends.html">Friends</a></li>
                        </ul>
                        <button class="btn-primary">Add Friend</button>
                    </div>
                </div><!--Timeline Menu for Small Screens End-->

            </div>

        </div>
    </div>
@endsection
@section('content')
    <!-- Basic Information
              ================================================= -->
        <div class="block-title">
            <h4 class="grey"><i class="icon ion-android-checkmark-circle"></i> Edit basic information</h4>
            <div class="line"></div>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
            <div class="line"></div>
        </div>
        @include('professor.layouts.message')
        <div class="edit-block">
            <form action="{{url('profile/update')}}" method="post" name="basic-info" id="basic-info" class="form-inline">
                @csrf
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label>New Password</label>
                        <input class="form-control input-group-lg" type="password" maxlength="60" name="password" placeholder="Enter New Password" required  />
                    </div>
                    <div class="form-group col-xs-12">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
            </form>
            <div class="form-group col-xs-6">
                <label>SSN</label>
                <input class="form-control input-group-lg" type="text" value="{{auth()->user()->ssn}}" readonly />
            </div>
            <div class="form-group col-xs-6">
                <label>Phone</label>
                <input class="form-control input-group-lg" type="text" value="{{auth()->user()->phone}}" readonly />
            </div>
            <div class="form-group col-xs-6">
                <label>First name</label>
                <input class="form-control input-group-lg" type="text" value="{{auth()->user()->first_name}}" readonly />
            </div>
            <div class="form-group col-xs-6">
                <label>Last name</label>
                <input class="form-control input-group-lg" type="text" value="{{auth()->user()->last_name}}" readonly />
            </div>
            <div class="form-group col-xs-6">
                <label>Birth Date</label>
                <input class="form-control input-group-lg" type="text" value="{{auth()->user()->birthDate}}" readonly />
            </div>
            <div class="form-group col-xs-6">
                <label>Address</label>
                <input class="form-control input-group-lg" type="text" value="{{auth()->user()->address}}" readonly />
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-12">
                <label>Professor Degree</label>
                @php $professor = \App\Model\Professor::where('user_id',auth()->user()->id)->first(); @endphp
                <input type="text" class="form-control input-group-lg" value="{{$professor->pro_degree}}" readonly />
            </div>
        </div>
        <div class="form-group gender">
            <span class="custom-label"><strong>Gender: </strong></span>
            <label class="radio-inline">
                <input type="radio" disabled {{(auth()->user()->gender == 'Male' ? 'checked' : '')}}>Male
            </label>
            <label class="radio-inline">
                <input type="radio" disabled {{(auth()->user()->gender == 'Female' ? 'checked' : '')}}>Female
            </label>
        </div>
    </div>
@endsection