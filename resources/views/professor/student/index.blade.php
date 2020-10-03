@extends('professor.layouts.app')
@section('content')
    <!-- Post Create Box  -->
    <div class="create-post">
        <div class="row">
            <img src="{{url('assets_front')}}/images/Departmental-Student-Elections-823x329.jpg" alt="" class="img-responsive post-image" />
        </div>
    </div><!-- Post Create Box End-->
    <!-- Post Content
    ================================================= -->
    @foreach($student as $stud)
    <div class="nearby-user">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                <img src="{{url('media/images/student/'.$stud->image)}}" alt="user" class="profile-photo-lg" />
            </div>
            <div class="col-md-7 col-sm-7">
                <h5><a href="{{url('message/'.$stud->id)}}" class="profile-link">{{$stud->first_name . ' ' . $stud->last_name}}</a></h5>
                <p>Student</p>
            </div>
            <div class="col-md-3 col-sm-3">
                <a href="{{url('message/'.$stud->id)}}" class="btn btn-primary pull-right">Send Messaged</a>
            </div>
        </div>
    </div>
        <br>
    @endforeach
    {{$student->links()}}
@endsection