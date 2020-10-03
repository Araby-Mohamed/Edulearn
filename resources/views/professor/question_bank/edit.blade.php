@extends('professor.layouts.app')
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

        <!-- Post Create Box
        ================================================= -->
        <div class="create-post">
            <div class="row">
                <img src="{{url('assets_front')}}/images/question-bank.jpg" alt="" class="img-responsive post-image" />
            </div>
        </div><!-- Post Create Box End-->
        @include('professor.layouts.message')
        <form method="post" action="{{url('question_bank/update/'.$question_bank->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Question<code>*</code></label>
                <input type="text" class="form-control" id="title" name="title" value="{{$question_bank->title}}" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <label for="title">Answer<code>*</code></label>
                <textarea type="text" class="form-control" id="content" name="answer" placeholder="Enter Content" required>{{$question_bank->answer}}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Subject<code>*</code></label>
                <select name="subject_id" class="form-control" required>
                    <option disabled selected>Select Subject</option>
                    @foreach($subject as $sub)
                        <option value="{{$sub->id}}" {{($sub->id == $question_bank->subject_id ? 'selected' : '')}}>{{$sub->name . ' ('.$sub->code.')'}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection