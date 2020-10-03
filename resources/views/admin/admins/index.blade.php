@extends('admin.layouts.app')
@section('title')
  Admins
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
                              <span class="caption-subject bold uppercase">Admins</span>
                          </div>
                          <div class="tools"> </div>
                      </div>
                      <div class="portlet-body">
                          <table class="table table-striped table-bordered table-hover" id="sample_1">
                              <thead>
                                  <tr>
                                      <th>Username</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                      <th>Username</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Action</th>
                                  </tr>
                              </tfoot>
                              <tbody>
                                @foreach($admins as $admin)
                                  <tr>
                                      <td>{{$admin->username}}</td>
                                      <td>{{$admin->email}}</td>
                                      <td>{{$admin->phone}}</td>
                                      <td>
                                          <div class="btn-toolbar margin-bottom-10">
                                            <div class="btn-group btn-group-solid">
                                               <a href="{{url('admin/admins/'.$admin->id)}}"  class="btn green"><i class="fa fa-eye"></i> View</a>
                                              <a href="{{url('admin/admins/edit/'.$admin->id)}}" type="button" class="btn blue"><i class="fa fa-edit"></i> Edit</a>
                                              <a href="{{url('admin/admins/delete/'.$admin->id)}}" class="btn red" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> Delete</a>
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
