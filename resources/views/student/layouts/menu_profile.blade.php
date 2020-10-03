<div class="col-md-9">
    <ul class="list-inline profile-menu">
        <li><a href="{{url('student/profile')}}" class=" {{ Request::is('student/profile*') ? 'active' : '' }}">Profile</a></li>
        <li><a href="{{url('student/subject')}}" class="{{ Request::is('student/subject*') ? 'active' : '' }}">Subject  <span class="label label-primary">{{$subjectCountStudent}}</span></a></li>
        <li><a href="{{url('student/task')}}">Tasks <span class="label label-info">{{$taskCountStudent}}</span></a></li>
        <li><a href="{{url('student/question_bank')}}">Question Bank <span class="label label-danger">{{$questionBankCountStudent}}</span></a></li>
    </ul>
    <ul class="follow-me list-inline">
        <li><a href="{{url('student/score')}}" class="btn-primary">Exam Grades</a></li>
    </ul>
</div>