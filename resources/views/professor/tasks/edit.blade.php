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
                <img src="{{url('assets_front')}}/images/edit-task.jpg" alt="" class="img-responsive post-image" />
            </div>
        </div><!-- Post Create Box End-->
        @include('professor.layouts.message')
        <form method="post" action="{{url('task/update/'.$task->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title<code>*</code></label>
                <input type="text" class="form-control" id="title" name="title" value="{{$task->title}}" placeholder="Enter Title" required>
            </div>
            <div class="form-group">
                <label for="title">Content</label>
                <textarea type="text" class="form-control" id="content" name="content" placeholder="Enter Content">{{$task->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="pdf_file">File</label>
                <input type="file" class="form-control" name="file" id="pdf_file">
            </div>
            <div class="form-group">
                <label for="content">Subject<code>*</code></label>
                <select name="subject_id" class="form-control" required>
                    <option disabled selected>Select Subject</option>
                    @foreach($subject as $sub)
                        <option value="{{$sub->id}}" {{($task->subject_id == $sub->id ? 'selected' : '')}}>{{$sub->name . ' ('.$sub->code.')'}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <p class="custom-label"><strong>End Date<code>*</code></strong></p>
                <div class="form-group col-sm-3 col-xs-6">
                    <label for="month" class="sr-only"></label>
                    <select class="form-control" name="day" id="day" required>
                        <option disabled>Day</option>
                        @for($day = 1; $day <= 31; $day++)
                            <option value="{{($day <= 9) ? '0'.$day : $day}}" {{('0'.$day == $days ? 'selected' : '')}} >{{$day}}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-6">
                    <label for="month" class="sr-only"></label>
                    <select class="form-control" name="month" id="month" required>
                        <option disabled>Month</option>
                        <option value="01" {{($months == '01' ? 'selected' : '')}}>Jan</option>
                        <option value="02" {{($months == '02' ? 'selected' : '')}}>Feb</option>
                        <option value="03" {{($months == '03' ? 'selected' : '')}}>Mar</option>
                        <option value="04" {{($months == '04' ? 'selected' : '')}}>Apr</option>
                        <option value="05" {{($months == '05' ? 'selected' : '')}}>May</option>
                        <option value="06" {{($months == '06' ? 'selected' : '')}}>Jun</option>
                        <option value="07" {{($months == '07' ? 'selected' : '')}}>Jul</option>
                        <option value="08" {{($months == '08' ? 'selected' : '')}}>Aug</option>
                        <option value="09" {{($months == '09' ? 'selected' : '')}}>Sep</option>
                        <option value="10" {{($months == '10' ? 'selected' : '')}}>Oct</option>
                        <option value="11" {{($months == '11' ? 'selected' : '')}}>Nov</option>
                        <option value="12" {{($months == '12' ? 'selected' : '')}}>Dec</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="year" class="sr-only"></label>
                    <select class="form-control" name="year" id="year" required>
                        <option value="year" disabled>Year</option>
                        @php $year = date('yy') @endphp
                        @for($i = $year; $i <= $year + 10;$i++)
                            <option value="{{$i}}" {{($i == $years ? 'selected' : '')}}>{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection