@extends('admin.layouts.app')
@section('title')
    Score
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    @include('admin.layouts.message')
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">Score</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4><strong>Name:</strong> {{$user->first_name . ' ' . $user->last_name}}</h4>
                        <h4 style="margin-top: 10px"><strong>Student Number:</strong> {{$student->stdNumber}}</h4>
                    </div>
                    <div class="col-md-6">
                        <h4><strong>Phone Number:</strong> {{$user->phone}}</h4>
                        <h4 style="margin-top: 10px"><strong>Total:</strong> {{$score->sum('score')}}</h4>
                    </div>
                </div>

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Score</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Subject</th>
                            <th>Score</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($score as $sco)
                            <tr>
                                <td>{{$sco->subject->name . ' ' .'('.$sco->subject->code.')'}}</td>
                                <td>{{$sco->score}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->

        </div>
    </div>
@endsection
