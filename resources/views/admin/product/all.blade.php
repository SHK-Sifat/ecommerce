@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>All Product Information
                </div>
                <div class="col-md-4 card_button_part">
                    <a href="{{url('dashboard/product/add')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Product</a>
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
                  <th>product_title</th>
                  <th>product_discount</th>
                  <th>product_available</th>
                  <th>product_categori</th>
                  <th>product_image</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                @foreach($all as $data)
                <tr>
                  <td>{{$data->product_title}}</td>
                  <td>{{$data->product_discount}}</td>
                  <td>{{$data->product_available}}</td>
                <td>{{$data->category->procate_name}}</td>
                  <td>
                    @if($data->product_image!='')
                      <img class="" height="40px" src="{{asset('uploads/product/'.$data->product_image)}}"/>
                    @else
                      <img class="" height="40px" src="{{asset('contents/admin/images/avatar.jpg')}}"/>
                    @endif
                  </td>
                  <td>
                      <div class="btn-group btn_group_manage" role="group">
                        <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{url('dashboard/product/view/'.$data->product_slug)}}">View</a></li>
                          <li><a class="dropdown-item" href="{{url('dashboard/product/edit/'.$data->product_slug)}}">Edit</a></li>
                          <li><a class="dropdown-item" href="{{url('dashboard/product/softdelete/'.$data->product_id)}}">Delete</a></li>
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
@endsection
