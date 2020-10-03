@extends('student.layouts.app')
@section('cover')
    <div class="container">

        <!-- Timeline
        ================================================= -->
        <div class="timeline">
            <div class="timeline-cover">

                <!--Timeline Menu for Large Screens-->
                <div class="timeline-nav-bar hidden-sm hidden-xs">
                    <div class="row">
                        <div class="col-md-3"></div>
                        @include('student.layouts.menu_profile')
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
    <!-- Start Content -->

        <!-- Post Create Box
        ================================================= -->
        <div class="create-post">
            <div class="row">
                <img src="{{url('assets_front/images/3705606.jpg')}}" alt="" class="img-responsive post-image" />
            </div>
        </div><!-- Post Create Box End-->

        <!-- Media
        ================================================= -->
    @include('professor.layouts.message')
    @if($material->count() > 0)
        <div class="row">
            <div class="list-group">
                @foreach($material as $mat)
                    <button type="button" class="list-group-item" data-toggle="modal" data-target="#myModal{{$mat->id}}" style="background: #03979d;
    color: #fff;
    border-bottom: 1px solid #fff;">{{$mat->lecture}}</button>
                @endforeach
            </div>
        </div>


    @foreach($material as $mat)
    <!-- Modal -->
    <div class="modal fade" id="myModal{{$mat->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{$mat->lecture}}</h4>
                </div>
                <div class="modal-body">
                    <a href="{{url('media/files/material/'.$mat->file)}}" target="_blank">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{url('assets_front\images\pdf.png')}}" style="width: 64px; margin-bottom: 0;" class="thumbnail">
                            </div>
                            <div class="col-md-9"><h5 style="font-size: 16px;font-weight: bold;margin-top: 26px;">Open File</h5></div>
                        </div>
                    </a>
                    @if($mat->content != '')
                        <hr style="border-top: 1px solid #ccc;">
                        {{$mat->content}}
                    @endif


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
        <h4 style="text-align: center;    font-weight: bold;">Sorry there are no material in this subject</h4>
    @endif
@endsection