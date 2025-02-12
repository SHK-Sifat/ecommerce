@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="post" action="{{url('dashboard/article/update')}}" enctype="multipart/form-data">
          @csrf
            <div class="card mb-3">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Article Update
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{url('dashboard/article')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Article</a>
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
                  <div class="row mb-3 {{ $errors->has('article_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Article Title<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="article_title" value="{{$data->article_title}}">
                      <input type="hidden" name="slug" value="{{$data->article_slug}}">
                      <input type="hidden" name="id" value="{{$data->article_id}}">
                      @if ($errors->has('article_title'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('article_title') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Article Subitle:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="article_subtitle" value="{{$data->article_subtitle}}">
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('article_web') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Article Web<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="article_web" value="{{$data->article_web}}">
                      @if ($errors->has('article_web'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('article_web') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('article_order') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Article Order<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="article_order" value="{{$data->article_order}}">
                      @if ($errors->has('article_order'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('article_order') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('article_image') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Article Image:</label>
                    <div class="col-sm-4">
                      <input type="file" class="form-control form_control" id="" name="article_image">
                      @if ($errors->has('article_image'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('article_image') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="col-sm-4">
                      @if($data->article_image!='')
                        <img class="" height="60px" src="{{asset('uploads/article/'.$data->article_image)}}"/>
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
