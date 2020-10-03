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
    <!-- Start Content -->
        <!-- Post Create Box
        ================================================= -->
        <div class="create-post">
            <div class="row">
                <img src="{{url('assets_front/images/3705606-Recovered--.jpg')}}" alt="" class="img-responsive post-image" />
            </div>
        </div><!-- Post Create Box End-->

        <!-- Media
        ================================================= -->
        @include('professor.layouts.message')
        <form method="post" action="{{url('material/create')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Lecture <code>*</code></label>
                <input type="text" class="form-control" id="title" name="lecture" value="{{old('lecture')}}" placeholder="Enter Lecture" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" value="{{old('content')}}" placeholder="Enter Your Details"></textarea>
            </div>
            <div class="form-group">
                <label for="content">Subject</label>
                <select name="subject_id" class="form-control" required>
                    <option disabled selected>Select Subject</option>
                    @foreach($subject as $sub)
                        <option value="{{$sub->id}}">{{$sub->name . ' ('.$sub->code.')'}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pdf_file">File <code>*</code></label>
                <input type="file" class="form-control" name="file" id="pdf_file" required>
                <code>pdf or docx max size 3000kb</code>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    <!-- End Content -->
@endsection