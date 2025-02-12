@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>All Category Information
                </div>
                <div class="col-md-4 card_button_part">
                    <a href="{{url('dashboard/category/add')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Category</a>
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
                  <th>Procat Name</th>
                  <th>Procat Url</th>
                  <th>Procat Photo</th>
                  <th>Procat Icon</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                @foreach($all as $data)
                <tr>
                  <td>{{$data->procate_name}}</td>
                  <td>{{$data->procate_url}}</td>
                  <td>
                    @if($data->procate_image!='')
                      <img class="" height="50px" src="{{asset('uploads/category/'.$data->procate_image)}}"/>
                    @else
                      <img class="" height="50px" src="{{asset('contents/admin/images/avatar.jpg')}}"/>
                    @endif
                  </td>
                  <td>
                    @if($data->procate_icon!='')
                      <img class="" height="50px" src="{{asset('uploads/category/icon/'.$data->procate_icon)}}"/>
                    @else
                      <img class="" height="50px" src="{{asset('contents/admin/images/avatar.jpg')}}"/>
                    @endif
                  </td>
                  <td>
                      <div class="btn-group btn_group_manage" role="group">
                        <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{url('dashboard/category/view/'.$data->procate_slug)}}">View</a></li>
                          <li><a class="dropdown-item" href="{{url('dashboard/category/edit/'.$data->procate_slug)}}">Edit</a></li>
                          <li>  <a class="dropdown-item" href="{{url('dashboard/category/softdelete/'.$data->procate_id)}}">Delete</a></li>
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

<div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="{{url('dashboard/category/softdelete')}}">
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
