@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="post" action="{{url('dashboard/contact/submit')}}" enctype="multipart/form-data">
          @csrf
            <div class="card mb-3">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Contact Registration
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{url('dashboard/contact')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>AllContact</a>
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
                    <div class="row mb-3 {{ $errors->has('contact_address') ? ' has-error' : '' }}">
                      <label class="col-sm-3 col-form-label col_form_label">Address<span class="req_star">*</span>:</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="contact_address" value="{{old('contact_address')}}">
                        @if ($errors->has('contact_address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('contact_address') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                  <div class="row mb-3{{ $errors->has('contact_phone1') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Phone-1<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="contact_phone1" value="{{old('contact_phone1')}}">
                      @if ($errors->has('contact_phone1'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('contact_phone1') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Phone-2:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="contact_phone2" value="{{old('contact_phone2')}}">
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('contact_email') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="email" class="form-control form_control" id="" name="contact_email" value="{{old('contact_email')}}">
                      @if ($errors->has('contact_email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('contact_email') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3 {{ $errors->has('contact_country') ? ' has-error' : '' }}">
                    <label class="col-sm-3 col-form-label col_form_label">Country<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="contact_country" value="{{old('contact_country')}}">
                      @if ($errors->has('contact_country'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('contact_country') }}</strong>
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
