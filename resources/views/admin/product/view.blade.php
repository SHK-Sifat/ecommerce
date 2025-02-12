@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>View Product Information
                </div>
                <div class="col-md-4 card_button_part">
                    <a href="{{url('dashboard/product')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Product</a>
                </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-bordered table-striped table-hover custom_view_table">
                      <tr>
                        <td>Product Title</td>
                        <td>:</td>
                        <td>{{$data->product_title}}</td>
                      </tr>
                      <tr>
                        <td>Product Details</td>
                        <td>:</td>
                        <td>{{$data->product_details}}</td>
                      </tr>
                      <tr>
                        <td>Product Discount</td>
                        <td>:</td>
                        <td>{{$data->product_discount}}</td>
                      </tr>
                      <tr>
                        <td>Product Available</td>
                        <td>:</td>
                        <td>{{$data->product_available}}</td>
                      </tr>
                      <tr>
                        <td>Product Oldprice</td>
                        <td>:</td>
                        <td>{{$data->product_oldprice}}</td>
                      </tr>
                      <tr>
                        <td>Product Newprice</td>
                        <td>:</td>
                        <td>{{$data->product_newprice}}</td>
                      </tr>
                      <tr>
                        <td>product_categori</td>
                        <td>:</td>
                        <td>{{$data->category->procate_name}}</td>
                      </tr>
                      <tr>
                        <td>Product Image</td>
                        <td>:</td>
                        <td>
                          @if($data->product_image!='')
                            <img class="img200"  src="{{asset('uploads/product/'.$data->product_image)}}"/>
                          @else
                            <img class="img200"  src="{{asset('contents/admin/images/avatar.jpg')}}"/>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>Create:</td>
                        <td>:</td>
                        <td>{{$data->created_at->format('d-m-Y | h:i:s A')}}</td>
                      </tr>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
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
