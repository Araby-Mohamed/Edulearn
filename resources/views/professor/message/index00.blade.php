@extends('professor.layouts.app')
@section('css')
    @livewireStyles
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
    <!-- Chat Room
            ================================================= -->
    <div class="chat-room">
        <div  class="row">
            <div class="col-md-5">

                <!-- Contact List in Left-->
                <ul class="nav nav-tabs contact-list scrollbar-wrapper scrollbar-outer">
                    @foreach($student as $stud)
                        <li class="" id="test-{{$stud->id}}">
                        <a href="#contact-{{$stud->id}}" data-toggle="tab">
                            <div class="contact">
                                <img src="{{url('media/images/student/'.$stud->image)}}" alt="" class="profile-photo-sm pull-left"/>
                                <div class="msg-preview">
                                    <h6>{{$stud->first_name . ' ' . $stud->last_name}}</h6>
                                    <p class="text-muted">Do you want to send a message?</p>
                                    {{--<small class="text-muted">a min ago</small>--}}
                                    {{--<div class="chat-alert">1</div>--}}
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul><!--Contact List in Left End-->

            </div>
            <div class="col-md-7">
                {{--@livewire('message')--}}
                <!--Chat Messages in Right-->
                    <div class="tab-content scrollbar-wrapper wrapper scrollbar-outer">
                        @foreach($student as $stud)
                            <div class="tab-pane {{($first_student->id == $stud->id ? 'active' : '')}} " id="contact-{{$stud->id}}">
                                <div class="chat-body">
                                    <ul class="chat-message">
                                        @foreach($message as $mes)
                                            @if($mes->from_user == $stud->id || $mes->to_user == $stud->id)
                                            <li class="{{($mes->from_user == auth()->user()->id ? 'right' : 'left')}}">
                                                @if($mes->from_user == auth()->user()->id)
                                                    @if(auth()->user()->level == 1)
                                                        <img src="{{ url('media/images/student/'.auth()->user()->image)}}" alt="" class="profile-photo-sm pull-{{($mes->from_user == auth()->user()->id ? 'right' : 'left')}}" />
                                                    @else
                                                        <img src="{{ url('media/images/professor/'.auth()->user()->image)}}" alt="" class="profile-photo-sm pull-{{($mes->from_user == auth()->user()->id ? 'right' : 'left')}}" />
                                                    @endif
                                                @else
                                                    <img src="{{ url('media/images/student/'.$stud->image)}}" alt="" class="profile-photo-sm pull-{{($mes->from_user == auth()->user()->id ? 'right' : 'left')}}" />
                                                @endif
                                                <div class="chat-item">
                                                    <div class="chat-item-header">
                                                        @if($mes->from_user == auth()->user()->id)
                                                            <h5>{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</h5>
                                                        @else
                                                            <h5>{{$stud->first_name . ' ' . $stud->last_name}}</h5>
                                                        @endif
                                                        <small class="text-muted">{{$mes->created_at->diffForHumans()}}</small>
                                                    </div>
                                                    <p>{{$mes->content}}</p>
                                                </div>
                                            </li>
                                            @endif
                                        @endforeach
                                        {{--<li class="right">--}}
                                        {{--<img src="{{url('media/images/professor/'.auth()->user()->image)}}" alt="" class="profile-photo-sm pull-right" />--}}
                                        {{--<div class="chat-item">--}}
                                        {{--<div class="chat-item-header">--}}
                                        {{--<h5>{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</h5>--}}
                                        {{--<small class="text-muted">3 days ago</small>--}}
                                        {{--</div>--}}
                                        {{--<p>I have been on vacation</p>--}}
                                        {{--</div>--}}
                                        {{--</li>--}}
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                    </div><!--Chat Messages in Right End-->

                    <form action="{{url('message/store')}}" method="post" id="form-chat">
                        @csrf
                        <div class="send-message">
                            <div class="input-group">
                                {{--<input type="text" class="form-control" wire:model="content" name="content" placeholder="Type your message">--}}
                                <input type="text" class="form-control" name="content" id="content-message" placeholder="Type your message">
                                {{--<input type="hidden" value="{{$first_student->id}}" wire:model="to_user" name="to_user" id="to_user">--}}
                                <input type="hidden" value="{{$first_student->id}}" name="to_user" id="to_user">
                                <span class="input-group-btn">
                    {{--<button class="btn btn-default" id="button-chat" wire:click="storeMessage" type="button">Send</button>--}}
                                    <button class="btn btn-default" id="button-chat" type="button">Send</button>
                </span>

                            </div>
                        </div>
                    </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function(){
            @foreach($student as $stud)
            $("#test-{{$stud->id}}").click(function(){
                $("#to_user").val("{{$stud->id}}");
            });
            @endforeach

            $('#button-chat').click(function () {
                var form = $('#form-chat').serialize();
                var url = $('#form-chat').attr('action');
                $.ajax({
                    url: url,
                    dataType: 'json',
                    data: form,
                    type: 'post',
                    beforeSend: function () {
                        //$('#content-message').attr('value') = null;
                    },success: function (data) {
                        $('.chat-message li').append(data.result);
                    }

                });
                return false;
            });
        });
    </script>

    @livewireScripts
@endsection