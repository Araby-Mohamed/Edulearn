@extends('professor.layouts.app')
@section('content')
<!-- Post Create Box  -->
<div class="create-post">
    <div class="row">
        <img src="{{url('assets_front')}}/images/2519410.jpg" alt="" class="img-responsive post-image" />
    </div>
</div><!-- Post Create Box End-->
<!-- Post Content
================================================= -->
    @foreach($events as $event)
        <div class="post-content">
        @if(!empty($event->image))
            <img src="{{url('media/images/event/'.$event->image)}}" alt="post-image" class="img-responsive post-image" />
        @endif
        <div class="post-container">
            <img src="{{url('media/images/user.png')}}" alt="user" class="profile-photo-md pull-left" />
            <div class="post-detail">
                <div class="user-info">
                    <h5><a href="#" class="profile-link">{{$event->admin->username}}</a></h5>
                    <p class="text-muted">{{$event->created_at->diffForHumans()}}</p>
                </div>

                <div class="line-divider"></div>
                <h4>{{$event->title}}</h4>
                <div class="post-text">
                    <p>{!! $event->content !!}</p>
                </div>
                <div class="line-divider"></div>
            </div>
        </div>
    </div>
    @endforeach
    {{$events->links()}}
@endsection