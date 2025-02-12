@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="post" action="{{url('dashboard/team/update')}}" enctype="multipart/form-data">
          @csrf
            <div class="card mb-3">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Team Update
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{url('dashboard/team')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Team Member</a>
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
                  <div class="row mb-3 {{ $errors->has('team_name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="team_name" value="{{$data->team_name}}">
                      @if ($errors->has('team_name'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('team_name') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('team_title') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Title<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="team_title" value="{{$data->team_title}}">
                      <input type="hidden" name="slug" value="{{$data->team_slug}}">
                      <input type="hidden" name="id" value="{{$data->team_id}}">
                      @if ($errors->has('team_title'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('team_title') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('team_facebook') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Facebook<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="team_facebook" value="{{$data->team_facebook}}">
                      @if ($errors->has('team_facebook'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('team_facebook') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('team_linkedin') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Linkedin<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="team_linkedin" value="{{$data->team_linkedin}}">
                      @if ($errors->has('team_linkedin'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('team_linkedin') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('team_instagram') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Instagram<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="team_instagram" value="{{$data->team_instagram}}">
                      @if ($errors->has('team_instagram'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('team_instagram') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('team_twitter') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Twitter<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="team_twitter" value="{{$data->team_twitter}}">
                      @if ($errors->has('team_twitter'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('team_twitter') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('team_image') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Image:</label>
                    <div class="col-sm-4">
                      <input type="file" class="form-control form_control" id="" name="team_image" value="{{old('team_image')}}">
                      @if ($errors->has('team_image'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('team_image') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="col-sm-4">
                      @if($data->team_image!='')
                        <img class="" height="60px" src="{{asset('uploads/team/'.$data->team_image)}}"/>
                      @else
                        <img class="" height="60px" src="{{asset('contents/admin/images/avatar.jpg')}}"/>
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
