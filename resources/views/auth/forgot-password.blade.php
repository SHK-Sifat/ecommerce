@extends('layouts.app')
@section('content')
<h3 class="mb-3">Forget Password</h3>
  <div class="bg-white shadow rounded">
      <div class="row">
          <div class="col-md-7 pe-0">
              <div class="form-left h-100 py-5 px-5">
                @if(Session::has('errors'))
                <div class="alert alert-danger alert_error" role="alert">
                   <strong>Opps!</strong> {{Session::get('error')}}
                </div>
                @endif
                  <form method="post" class="row g-4" action="{{ route('password.email') }}">
                    @csrf
                      <div class="col-12 offset-3">
                          <label>Email<span class="text-danger">*</span></label>
                          <div class="input-group">
                              <div class="input-group-text"><i class="fas fa-user"></i></div>
                              <input type="email" class="form-control" name="email" id="email" placeholder="enter email address" value="{{old('email')}}" required>
                          </div>
                      </div>
                      <div class="col-sm-4 offset-1">
                          <a href="{{ url('login') }}" class="float-end text-primary">Back</a>
                      </div>

                      <div class="col-12">
                          <button type="submit" class="btn btn-primary px-4 float-end mt-4">Submit</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
@endsection
