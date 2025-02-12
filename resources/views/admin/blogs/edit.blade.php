@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="post" action="{{url('dashboard/blogs/update')}}" enctype="multipart/form-data">
          @csrf
            <div class="card mb-3">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Blog Update
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{url('dashboard/blogs')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Blog</a>
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
                  <div class="row mb-3 {{ $errors->has('blog_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Blog Title<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="blog_title" value="{{$data->blog_title}}">
                      <input type="hidden" name="slug" value="{{$data->blog_slug}}">
                      <input type="hidden" name="id" value="{{$data->blog_id}}">
                      @if ($errors->has('blog_title'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('blog_title') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Blog Subitle:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="blog_subtitle" value="{{$data->blog_subtitle}}">
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('blog_web') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Blog Web<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="blog_web" value="{{$data->blog_web}}">
                      @if ($errors->has('blog_web'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('blog_web') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('blog_order') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Blog Order<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="blog_order" value="{{$data->blog_order}}">
                      @if ($errors->has('blog_order'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('blog_order') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('blog_image') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Blog Image:</label>
                    <div class="col-sm-4">
                      <input type="file" class="form-control form_control" id="" name="blog_image">
                      @if ($errors->has('blog_image'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('blog_image') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="col-sm-4">
                      @if($data->blog_image!='')
                        <img class="" height="60px" src="{{asset('uploads/blogs/'.$data->blog_image)}}"/>
                      @else
                        <img class="" height="60px" src="{{asset('contents/admin/images/avatar.jpg')}}"/>
                      @endif
                    </div>
                  </div>
              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
              </div>
            </div>
        </form>
    </div>
</div>
@endsection
