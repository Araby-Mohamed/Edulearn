@extends('admin.layouts.app')
@section('title')
  Professor
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
                              <span class="caption-subject bold uppercase">Professor</span>
                          </div>
                          <div class="tools"> </div>
                      </div>
                      <div class="portlet-body">
                          <table class="table table-striped table-bordered table-hover" id="sample_1">
                              <thead>
                                  <tr>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Action</th>
                                  </tr>
                              </tfoot>
                              <tbody>
                                @foreach($professor as $prof)
                                  <tr>
                                      <td>{{$prof->first_name}}</td>
                                      <td>{{$prof->last_name}}</td>
                                      <td>{{$prof->email}}</td>
                                      <td>{{$prof->phone}}</td>
                                      <td>
                                          <div class="btn-toolbar margin-bottom-10">
                                            <div class="btn-group btn-group-solid">
                                                <form action="{{url('admin/professor/'.$prof->id)}}" method="post">
                                                    <a href="{{url('admin/professor/'.$prof->id)}}"  class="btn green"><i class="fa fa-eye"></i> View</a>
                                                    <a href="{{url('admin/professor/'.$prof->id.'/edit')}}" type="button" class="btn blue"><i class="fa fa-edit"></i> Edit</a>
                                                    @if(auth()->guard('admin')->user()->level != 3)
                                                        @csrf
                                                        @method('DELETE')
                                                        <button  class="btn red" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> Delete</button>
                                                    @endif
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
