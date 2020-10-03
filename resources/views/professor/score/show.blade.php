@extends('professor.layouts.app')
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
    <!-- Start Content -->
    <div class="faq-headline">
        <h3 class="item-title grey"><i class="icon ion-ios-information-outline"></i>Student Score</h3>
    </div>
    @include('professor.layouts.message')
    <table>
        <tr>
            <th>Student Name</th>
            <th>Score</th>
            <th>Edit</th>
        </tr>
        @foreach($score as $sc)
        <tr id="score-table">
            <td>{{$sc->user->first_name . ' ' . $sc->user->last_name}}</td>
            <td>{{$sc->score}}</td>
            <td><button style="border: none;outline: none;background: #5cb85c;border-radius: 5px;" data-toggle="modal" data-target="#exampleModal-{{$sc->id}}"><span class="label label-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></button></td>
        </tr>
        @endforeach

    </table>

    {{$score->links()}}

    <!-- Modal -->
    @foreach($score as $sc)
        <div class="modal fade" id="exampleModal-{{$sc->id}}" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{$sc->user->first_name . ' ' . $sc->user->last_name }}</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('score/update/'.$sc->id)}}" method="post" id="form-score">
                            @csrf
                            <div class="form-group">
                                <input type="number" value="{{$sc->score}}" name="score" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary" id="button-score">Save</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
    <!-- End Content -->
@endsection

@section('js')
    <script>
 //       $(document).ready(function(){

//            $.ajax({
//                type: 'GET',
//                dataType: 'json',
//                url: '10',
//                success: function (res) {
//                    var row = '';
//                    $.each(res,function (key,value) {
//                        row = row + "<td>"+value.first_name+","+value.last_name+"</td>";
//                        row = row + "<td>"+value.score+"</td>";
//                        row = row + "<td>";
////                        row = row + "<button style='border: none;outline: none;background: #5cb85c;border-radius: 5px;' data-toggle='modal' data-target='#exampleModal-"+value.id+'>"<span class="label label-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></button>";
//                        row = row + "</td>";
//                    });
//                    $('#score-table').prepend(rows);
//                }
//            });
//
//            $('#button-score').click(function () {
//                var form = $('#form-score').serialize();
//                var url = $('#form-score').attr('action');
//                $.ajax({
//                    url: url,
//                    dataType: 'json',
//                    data: form,
//                    type: 'post',
//                    beforeSend: function () {
//
//                    },success: function (data) {
//                        //$('#content-message').attr('value') = null;
//                        //$('tr.score').append(data.result);
//                        var row = '';
//                        $.each(data.result,function (key,value) {
//                            row = row + "<td>"+value.first_name+","+value.last_name+"</td>";
//                            row = row + "<td>"+value.score+"</td>";
//                            row = row + "<td>";
////                            row = row + "<button style='border: none;outline: none;background: #5cb85c;border-radius: 5px;' data-toggle='modal' data-target='#exampleModal-"+value.id+'>"<span class="label label-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></button>";
//                            row = row + "</td>";
//                        });
//                        $('#studentTable tbody #'+ data.id).html(student);
//                        $('#updateStudent')[0].reset();
//                        $('#updateModal').modal('hide');
//                        $('#score-table').html(row);
//                    }
//
//                });
//                return false;
//            });
//
//        });
        </script>
@endsection