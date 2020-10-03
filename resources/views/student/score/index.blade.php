@extends('student.layouts.app')
@section('css')
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #03979d;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #03979d;
            color: #fff;
        }
    </style>
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
                        @include('student.layouts.menu_profile')
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
    <!-- Start Content -->
    <div class="faq-headline">
        <h3 class="item-title grey"><i class="icon ion-ios-information-outline"></i> Student Score</h3>
        <div class="post-text">
            <div class="row">
                <div class="col-md-6">
                    <p><strong style="color: #03979d;">Name: </strong>{{auth()->user()->first_name . ' ' . auth()->user()->last_name}}</p>
                    <p><strong style="color: #03979d;">Student Number: </strong>{{$studentNumber->stdNumber}}</p>
                </div>
                <div class="col-md-6">
                    <p><strong style="color: #03979d;">Name: </strong>{{auth()->user()->email}}</p>
                    <p><strong style="color: #03979d;">Phone Number: </strong>{{auth()->user()->phone}}</p>
                </div>
            </div>
            <br>

        </div>
    </div>
    @include('student.layouts.message')
    <table>
        <tr>
            <th>Subject</th>
            <th>Score</th>
            <th>Date</th>
        </tr>
        @foreach($score as $sc)
            <tr id="score-table">
                <td>{{$sc->subject->name . ' ' . '('.$sc->subject->code.')'}}</td>
                <td>{{$sc->score}}</td>
                <td>{{$sc->created_at->diffForHumans()}}</td>
            </tr>
        @endforeach

    </table>

    <!-- End Content -->
@endsection