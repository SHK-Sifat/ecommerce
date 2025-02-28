@extends('layouts.app')
@section('content')
<h3 class="mb-3">Login Now</h3>
  <div class="bg-white shadow rounded">
      <div class="row">
          <div class="col-md-7 pe-0">
              <div class="form-left h-100 py-5 px-5">
                @if(Session::has('errors'))
                <div class="alert alert-danger alert_error" role="alert">
                   <strong>Opps!</strong> {{Session::get('error')}}
                </div>
                @endif
                  <form method="post" class="row g-4" action="{{route('login')}}">
                    @csrf
                      <div class="col-12">
                          <label>Email<span class="text-danger">*</span></label>
                          <div class="input-group">
                              <div class="input-group-text"><i class="fas fa-user"></i></div>
                              <input type="email" class="form-control" name="email" id="email" placeholder="enter email address" value="{{old('email')}}" required>
                          </div>
                      </div>

                      <div class="col-12">
                          <label>Password<span class="text-danger">*</span></label>
                          <div class="input-group">
                              <div class="input-group-text"><i class="fas fa-lock"></i></div>
                              <input type="password" class="form-control" name="password" id="password" placeholder="enter password" required>
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                              <label class="form-check-label" for="inlineFormCheck">Remember me</label>
                          </div>
                      </div>

                      <div class="col-sm-6">
                          <a href="{{ url('forgot-password') }}" class="float-end text-primary">Forgot Password?</a>
                      </div>

                      <div class="col-12">
                          <button type="submit" class="btn btn-primary px-4 float-end mt-4">login</button>
                      </div>
                  </form>
              </div>
          </div>
          <div class="col-md-5 ps-0 d-none d-md-block">
              <div class="form-right h-100 bg-primary text-white text-center pt-5">
                  <i class="fas fa-user-shield"></i>
                  <h2 class="fs-1">Welcome Back!!!</h2>
              </div>
          </div>
      </div>
  </div>
@endsection
