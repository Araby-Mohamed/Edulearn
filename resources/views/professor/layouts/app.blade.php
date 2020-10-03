@include('professor.layouts.header')
@yield('cover')
<div id="page-contents">
    <div class="container">
        <div class="row">

            <!-- Newsfeed Common Side Bar Left
            ================================================= -->
            <div class="col-md-3 static">
                <div class="profile-card" style="background: linear-gradient(to bottom, rgba(3, 151, 157, 0.8), rgba(6, 146, 152, 0.8)), url('assets_front/images/about/vision.jpg') no-repeat;">
                    @if(!empty(auth()->user()->image))
                        <img src="{{url('media/images/' . (auth()->user()->level != 2 ? 'student/' : 'professor/') . auth()->user()->image )}}" alt="user" class="profile-photo" />
                    @else
                        <img src="{{url('media/images/user.png')}}" alt="user" class="profile-photo" />
                    @endif
                    <h5><a href="{{url('profile')}}" class="text-white">{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</a></h5>
                </div><!--profile card ends-->
                <ul class="nav-news-feed">
                    <li><i class="icon ion-images"></i><div><a href="{{url('/')}}">Events</a></div></li>
                    <li><i class="icon ion-ios-paper"></i><div><a href="{{url('task')}}">My Tasks</a></div></li>
                    <li><i class="icon ion-ios-paper"></i><div><a href="{{url('task/create')}}">Add Task</a></div></li>
                    <li><i class="icon ion-ios-people"></i><div><a href="{{url('subject')}}">Subject</a></div></li>
                    <li><i class="icon ion-ios-people-outline"></i><div><a href="{{url('material')}}">Add Material</a></div></li>
                    <li><i class="icon ion-chatboxes"></i><div><a href="{{url('student')}}">Messages</a></div></li>
                    <li><i class="icon ion-ios-paper"></i><div><a href="{{url('exam')}}">My Exams</a></div></li>
                    <li><i class="icon ion-ios-paper"></i><div><a href="{{url('exam/create')}}">Add Exams</a></div></li>
                    <li><i class="icon ion-ios-videocam"></i><div><a href="{{url('question_bank')}}">Question Bank</a></div></li>
                    <li><i class="icon ion-ios-videocam"></i><div><a href="{{url('question_bank/create')}}">Add Question Bank</a></div></li>
                </ul><!--news-feed links ends-->
            </div>

            <div class="col-md-7">
                @yield('content')
            </div>

            <!-- Newsfeed Common Side Bar Right
            ================================================= -->
            <div class="col-md-2 static">
                <div class="suggestions" id="sticky-sidebar">
                    <h4 class="grey">New Student</h4>
                    @foreach($students as $student)
                        <div class="follow-user">
                        <img src="{{(!empty($student->image) ? url('media/images/student/'.$student->image) : url('media/images/user.png'))}}" alt="" class="profile-photo-sm pull-left" />
                        <div>
                            <h5><a href="{{url('message/'.$student->id)}}">{{$student->first_name . ' ' . $student->last_name}}</a></h5>
                            <a href="{{url('message/'.$student->id)}}" class="text-green">Send Message</a>
                        </div>
                    </div>
                    @endforeach
                    <a href="{{url('student')}}" class="btn btn-primary pull-right">All Student</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('professor.layouts.footer')