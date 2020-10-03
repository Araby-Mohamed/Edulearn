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
    <!-- Chat Room
            ================================================= -->
    <div class="chat-room">
        <!--Chat Messages in Right-->
        <div class="tab-content scrollbar-wrapper wrapper scrollbar-outer" id="message-chat">
            <div class="tab-pane active" id="contact-1">
                <div class="chat-body">
                    <ul class="chat-message">
                        @foreach($message as $mes)
                            <div id="test">
                                @include('professor.message.chat')
                            </div>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div><!--Chat Messages in Right End-->
        <div class="send-message">
            <form action="{{url('message/store',request()->route('id'))}}" id="form-chat" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="content" id="content-message" placeholder="Type your message">
                    <span class="input-group-btn">
                        <button class="btn btn-default" id="button-chat" type="button">Send</button>
                      </span>
                </div>
            </form>

        </div>
            <div class="clearfix"></div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#button-chat').click(function () {
                var form = $('#form-chat').serialize();
                var url = $('#form-chat').attr('action');
                $.ajax({
                    url: url,
                    dataType: 'json',
                    data: form,
                    type: 'post',
                    beforeSend: function () {
                        $("#content-message").val('');
                    },success: function (data) {
                        //$('#content-message').attr('value') = null;
                        $('ul.chat-message').append(data.result);
                        var messages = $('#message-chat');
                        return messages.animate({ scrollTop: messages.prop('scrollHeight') }, 300);
                    }

                });
                return false;
            });

            $('#content-message').keypress(function (event) {
                if (event.key === "Enter") {
                    var form = $('#form-chat').serialize();
                    var url = $('#form-chat').attr('action');
                    $.ajax({
                        url: url,
                        dataType: 'json',
                        data: form,
                        type: 'post',
                        beforeSend: function () {
                            $("#content-message").val('');
                        }, success: function (data) {
                            //$('#content-message').attr('value') = null;

                            $('ul.chat-message').append(data.result);
                            var messages = $('#message-chat');
                            return messages.animate({scrollTop: messages.prop('scrollHeight')}, 300);
                        }

                    });
                    return false;
                }
            });
            var messages = $('#message-chat');
            return messages.animate({ scrollTop: messages.prop('scrollHeight') }, 300);



//            setInterval(function () {
//                $('#message-chat').load("message/28").fadeIn("slow");
//            },5000);


//            setInterval(function(){ alert("Hello"); }, 3000);



        });

//        window.onload = (event) => {
//            setInterval(function(){
//                $('#test').load('../../resources/views/professor/message/chat.blade.php').fadeIn("slow");
//                }, 3000);
//        };

//        $(document).ready(function(){
//            setInterval(fetchdata,5000);
//        });

        // chat-room
        // chat-message

    </script>

@endsection