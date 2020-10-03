<div class="col-md-9">
    <ul class="list-inline profile-menu">
        <li><a href="{{url('profile')}}" class=" {{ Request::is('profile*') ? 'active' : '' }}">Profile</a></li>
        <li><a href="{{url('subject')}}" class="{{ Request::is('subject*') ? 'active' : '' }}">Subject  <span class="label label-primary">{{$subjectCount}}</span></a></li>
        <li><a href="{{url('material')}}" class="{{ Request::is('material*') ? 'active' : '' }}">Material  <span class="label label-success">{{$materialCount}}</span></a></li>
        <li><a href="{{url('task')}}">Tasks <span class="label label-info">{{$taskCount}}</span></a></li>
        <li><a href="{{url('question_bank')}}">Question Bank <span class="label label-danger">{{$questionBankCount}}</span></a></li>
    </ul>
    <ul class="follow-me list-inline">
        <li><a href="{{url('score')}}" class="btn-primary">Student grades</a></li>
    </ul>
</div>