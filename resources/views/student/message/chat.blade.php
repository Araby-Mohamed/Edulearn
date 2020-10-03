@php
    $professor = \App\User::where('level', 2)->where('id', Request::route('id'))->first();
@endphp
@if($mes->from_user == Request::route('id') || $mes->to_user == Request::route('id'))
<li class="{{($mes->from_user == auth()->user()->id ? 'right' : 'left')}}">
    <img src="{{url('media/images/'. ($mes->from_user == auth()->user()->id ? 'student/'.auth()->user()->image : 'professor/'.$professor->image ))}}" alt="" class="profile-photo-sm pull-{{($mes->from_user == auth()->user()->id ? 'right' : 'left')}}" />
    <div class="chat-item">
        <div class="chat-item-header">
            <h5>{{ ($mes->from_user == auth()->user()->id ? auth()->user()->first_name . auth()->user()->lase_name : $professor->first_name . $professor->last_name) }}</h5>
            <small class="text-muted">{{$mes->created_at->diffForHumans()}}</small>
        </div>
        <p>{{$mes->content}}</p>
    </div>
</li>
    @endif
