@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="post" action="{{url('dashboard/blogs/submit')}}" enctype="multipart/form-data">
          @csrf
            <div class="card mb-3">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Blogs Registration
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{url('dashboard/blogs')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Blogs</a>
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
                    <label class="col-sm-3 col-form-label col_form_label">Blogs Title<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="blog_title" value="{{old('blog_title')}}">
                      @if ($errors->has('blog_title'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('blog_title') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Blogs Subitle:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="blog_subtitle">
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('blog_web') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Blogs Web<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="blog_web" value="{{old('blog_web')}}">
                      @if ($errors->has('blog_web'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('blog_web') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('blog_order') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Blogs Order<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="blog_order" value="{{old('blog_order')}}">
                      @if ($errors->has('blog_order'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('blog_order') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('blog_image') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Blogs Image:</label>
                    <div class="col-sm-4">
                      <input type="file" class="form-control form_control" id="" name="blog_image" value="{{old('blog_image')}}">
                      @if ($errors->has('blog_image'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('blog_image') }}</strong>
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
