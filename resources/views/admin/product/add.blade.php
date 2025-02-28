@extends('layouts.admin')
@section('content')
@php
    $all_category=App\Models\ProductCategory::where('procate_status',1)->orderBy('procate_name','ASC')->get();
@endphp
<div class="row">
    <div class="col-md-12 ">
        <form method="post" action="{{url('dashboard/product/submit')}}" enctype="multipart/form-data">
          @csrf
            <div class="card mb-3">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Product Registration
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{url('dashboard/product')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Product</a>
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
                  <div class="row mb-3 {{ $errors->has('product_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Product Title<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="product_title" value="{{old('product_title')}}">
                      @if ($errors->has('product_title'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('product_title') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('product_details') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Product Details<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="product_details" value="{{old('product_details')}}">
                      @if ($errors->has('product_details'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('product_details') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Product Discount:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="product_discount" value="{{old('product_discount')}}">
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('product_available') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Product Available<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="product_available" value="{{old('product_available')}}">
                      @if ($errors->has('product_available'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('product_available') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 ">
                    <label class="col-sm-3 col-form-label col_form_label">Product Oldprice:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="product_oldprice" value="{{old('product_oldprice')}}">
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('product_newprice') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Product Newprice<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="product_newprice" value="{{old('product_newprice')}}">
                      @if ($errors->has('product_newprice'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('product_newprice') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 ">
                    <label class="col-sm-3 col-form-label col_form_label">Product Fabric:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="fabric" value="{{old('fabric')}}">
                    </div>
                  </div>
                  <div class="row mb-3 ">
                    <label class="col-sm-3 col-form-label col_form_label">Product Ctions:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="ctions" value="{{old('ctions')}}">
                    </div>
                  </div>
                  <div class="row mb-3 ">
                    <label class="col-sm-3 col-form-label col_form_label">Product Sleeve:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="sleeve" value="{{old('sleeve')}}">
                    </div>
                  </div>
                  <div class="row mb-3 ">
                    <label class="col-sm-3 col-form-label col_form_label">Product Origin:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="origin" value="{{old('origin')}}">
                    </div>
                  </div>

                  <div class="row mb-3 {{$errors->has('protype')?'has-error':''}}">
                    <label class="col-sm-3 col-form-label col_form_label">Product Type<span class="req_star">*</span>:</label>
                    <div class="col-sm-4">
                      <select class="form-control form_control" id="" name="protype">
                        @php
                            $all_type=App\Models\ProductType::where('protype_status',1)->orderBy('protype_name','ASC')->get();
                        @endphp
                        <option>Select Categori</option>
                          @foreach($all_type as $type)
                          <option value="{{$type->protype_id}}">{{$type->protype_name}}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('protype'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('protype') }}</strong>
                      </span>
                      @endif
                    </div>

                  </div>
                  <div class="row mb-3 {{$errors->has('product_categori')?'has-error':''}}">
                    <label class="col-sm-3 col-form-label col_form_label">Product Categori<span class="req_star">*</span>:</label>
                    <div class="col-sm-4">
                      <select class="form-control form_control" id="" name="product_categori">

                        <option>Select Categori</option>
                          @foreach($all_category as $cate)
                          <option value="{{$cate->procate_id}}">{{$cate->procate_name}}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('product_categori'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('product_categori') }}</strong>
                      </span>
                      @endif
                    </div>

                  </div>
                  <div class="row mb-3 {{ $errors->has('product_newprice') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Product Image:</label>
                    <div class="col-sm-4">
                      <input type="file" class="form-control form_control" id="" name="product_image" value="{{old('product_image')}}">
                      @if ($errors->has('product_image'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('product_image') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-sm btn-dark">REGISTRATION</button>
              </div>
            </div>
        </form>
    </div>
</div>
@endsection
