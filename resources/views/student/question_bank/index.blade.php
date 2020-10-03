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
        <div class="media">
            <div class="row js-masonry">
                @foreach($subject as $sub)
                    <div class="grid-item col-md-6 col-sm-6">
                    <a href="{{url('student/question_bank/'.$sub->id)}}">
                        <div class="media-grid">
                            <div class="img-wrapper" data-toggle="modal" data-target=".modal-1">
                                <img src="{{(!empty($sub->image) ? url('media/images/subject/'.$sub->image) : url('media/images/subject.png'))}}" alt="" class="img-responsive post-image" />
                            </div>
                            <div class="media-info">
                                <div class="reaction">
                                    <h4>{{$sub->name . ' ' . '(' . $sub->code . ')' }}</h4>
                                    <a class="btn text-green"><i class="fa fa-book"></i> {{ \App\Model\QuestionBank::where('subject_id',$sub->id)->get()->count() }} Question Bank</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

    <!-- End Content -->
@endsection