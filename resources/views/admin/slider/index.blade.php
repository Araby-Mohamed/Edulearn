@extends('admin.layouts.app')
@section('title')
  Events
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
                              <span class="caption-subject bold uppercase">Slider</span>
                          </div>
                          <div class="tools"> </div>
                      </div>
                      <div class="portlet-body">
                          <table class="table table-striped table-bordered table-hover" id="sample_1">
                              <thead>
                                  <tr>
                                      <th>Title</th>
                                      <th>Image</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                      <th>Title</th>
                                      <th>Image</th>
                                      <th>Action</th>
                                  </tr>
                              </tfoot>
                              <tbody>
                                @foreach($slider as $slide)
                                  <tr>
                                      <td>{{$slide->title}}</td>
                                      <td><img src="{{ (!empty($slide->image)) ? url('media/images/slider/'.$slide->image) : url('media/images/subject.png') }}" width="70px" class="thumbnail"></td>
                                      <td>
                                          <div class="btn-toolbar margin-bottom-10">
                                            <div class="btn-group btn-group-solid">
                                                <form action="{{url('admin/slider/'.$slide->id)}}" method="post">
                                                    <a href="{{url('admin/slider/'.$slide->id)}}"  class="btn green"><i class="fa fa-eye"></i> View Details</a>
                                                    <a href="{{url('admin/slider/'.$slide->id.'/edit')}}" type="button" class="btn blue"><i class="fa fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  class="btn red" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> Delete</button>
                                                </form>

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
