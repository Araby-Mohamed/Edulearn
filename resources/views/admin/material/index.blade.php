@extends('admin.layouts.app')
@section('title')
    Material
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
                        <span class="caption-subject bold uppercase">Material > {{$subject->name}}</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                        <tr>
                            <th>Lecture</th>
                            <th>Content</th>
                            <th>File</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Lecture</th>
                            <th>Content</th>
                            <th>File</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($material as $mat)
                            <tr>
                                <td>{{$mat->lecture}}</td>
                                <td>{{$mat->content}}</td>
                                <td>
                                    <div class="btn-toolbar margin-bottom-10">
                                        <div class="btn-group btn-group-solid">
                                            <a href="{{url('media/files/material/'.$mat->file)}}" target="_blank" class="btn green"><i class="fa fa-eye"></i> View Material</a>
                                        </div>
                                    </div>
                                </td>
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
