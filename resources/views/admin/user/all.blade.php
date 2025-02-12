@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>All User Information
                </div>
                <div class="col-md-4 card_button_part">
                    <a href="{{url('dashboard/user/add')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add User</a>
                </div>
            </div>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7">
                    @if(Session::has('success'))
                      <div class="alert alert-success alert_success" role="alert">
                         <strong>Success!</strong> {{Session::get('success')}}
                      </div>
                    @endif
                    @if(Session::has('error'))
                      <div class="alert alert-danger alert_error" role="alert">
                         <strong>Opps!</strong> {{Session::get('error')}}
                      </div>
                    @endif
                </div>
                <div class="col-md-2"></div>
            </div>
            <table class="table table-bordered table-striped table-hover custom_table">
              <thead class="table-dark">
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Photo</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                @foreach($all as $data)
                <tr>
                  <td>{{$data->name}}</td>
                  <td>{{$data->phone}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->username}}</td>
                  <td>{{$data->roleInfo->role_name}}</td>
                  <td>
                    @if($data->photo!='')
                      <img class="" height="40px" src="{{asset('uploads/users/'.$data->photo)}}"/>
                    @else
                      <img class="" height="40px" src="{{asset('contents/admin/images/avatar.jpg')}}"/>
                    @endif
                  </td>
                  <td>
                      <div class="btn-group btn_group_manage" role="group">
                        <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{url('dashboard/user/view/'.$data->slug)}}">View</a></li>
                          <li><a class="dropdown-item" href="{{url('dashboard/user/edit/'.$data->slug)}}">Edit</a></li>
                        <a class="dropdown-item" href="{{url('dashboard/user/softdelete/'.$data->id)}}">Delete</a>
                        </ul>
                      </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <div class="btn-group" role="group" aria-label="Button group">
              <button type="button" class="btn btn-sm btn-dark">Print</button>
              <button type="button" class="btn btn-sm btn-secondary">PDF</button>
              <button type="button" class="btn btn-sm btn-dark">Excel</button>
            </div>
          </div>
        </div>
    </div>
</div>
<!--softdelete modal start-->
<div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="{{url('dashboard/user/softdelete')}}">
      @csrf
      <div class="modal-content">
        <div class="modal-header modal_header">
            <h5 class="modal-title mt-0" id="myModalLabel"><i class="fab fa-gg-circle"></i> Confirm Message</h5>
        </div>
        <div class="modal-body modal_card">
          Are you sure you want to delete?
          <input type="hidden" id="modal_id" name="modal_id">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-md btn-dark waves-effect waves-light">Confirm</button>
            <button type="button" class="btn btn-md btn-danger waves-effect" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
