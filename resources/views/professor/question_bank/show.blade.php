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

            <!-- FAQ Content
            ================================================= -->
            @include('professor.layouts.message')

            <div class="tab-content faq-content">

                <!-- FAQ Category Content : General -->
                <div class="tab-pane active" id="faq_cat_1">
                    <div class="faq-headline">
                        <h3 class="item-title grey"><i class="icon ion-ios-information-outline"></i>Questions Bank {{$subject->name}}</h3>
                    </div>
                    @if($question_bank->count() > 0)
                    <div class="panel-group" id="faqAccordion-1">
                        @foreach($question_bank as $faq)
                            <div class="panel panel-default ">
                            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion-1" data-target="#question_{{$faq->id}}">
                                <h4 class="panel-title"><a href="javascript:void(0);" class="ing">Q: {{$faq->title}}</a></h4>
                            </div>
                            <div id="question_{{$faq->id}}" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
                                    <h5><span class="label label-primary">Answer</span></h5>
                                    <p>{{$faq->answer}}</p>
                                    <a href="{{url('question_bank/delete/'.$faq->id)}}" onclick="return confirm('Are you sure you want to delete this item?');"><span class="label label-danger" style="margin-left: 5px;"><i class="fa fa-trash-o" aria-hidden="true"></i></span></a>
                                    <a href="{{url('question_bank/edit/'.$faq->id)}}"><span class="label label-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></a>
                                </div>
                            </div>
                        </div><!-- .panel -->
                        @endforeach
                    </div><!-- .panel-group -->
                    @else
                        <h4 style="text-align: center;font-weight: bold;">There are no Question Bank</h4>
                    @endif
                </div><!-- #faq_cat_1 -->
                {{$question_bank->links()}}

            </div>

@endsection

