<div>
    <!--Chat Messages in Right-->
    <div class="tab-content scrollbar-wrapper wrapper scrollbar-outer">
        @foreach($student as $stud)
            {{--<div class="tab-pane active" id="contact-{{$stud->id}}">--}}
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
                <input type="text" class="form-control" name="content" placeholder="Type your message">
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
