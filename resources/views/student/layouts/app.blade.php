@include('student.layouts.header')
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
                    <h5><a href="{{url('student/profile')}}" class="text-white">{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</a></h5>
                </div><!--profile card ends-->
                <ul class="nav-news-feed">
                    <li><i class="icon ion-images"></i><div><a href="{{url('/home')}}">Events</a></div></li>
                    <li><i class="icon ion-ios-paper"></i><div><a href="{{url('student/task')}}">My Tasks</a></div></li>
                    <li><i class="icon ion-ios-people"></i><div><a href="{{url('student/subject')}}">Subject</a></div></li>
                    <li><i class="icon ion-ios-paper"></i><div><a href="{{url('student/exam')}}">My Exams</a></div></li>
                    <li><i class="icon ion-ios-videocam"></i><div><a href="{{url('student/question_bank')}}">Question Bank</a></div></li>
                </ul><!--news-feed links ends-->
            </div>

            <div class="col-md-7">
                @yield('content')
            </div>

            <!-- Newsfeed Common Side Bar Right
            ================================================= -->
            <div class="col-md-2 static">
                <div class="suggestions" id="sticky-sidebar">
                    <h4 class="grey">Professors</h4>
                    @foreach($professor as $prof)
                        <div class="follow-user">
                        <img src="{{(!empty($prof->image) ? url('media/images/professor/'.$prof->image) : url('media/images/user.png'))}}" alt="" class="profile-photo-sm pull-left" />
                        <div>
                            <h5><a href="{{url('student/message/'.$prof->id)}}">{{$prof->first_name . ' ' . $prof->last_name}}</a></h5>
                            <a href="{{url('student/message/'.$prof->id)}}" class="text-green">Send Message</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('professor.layouts.footer')