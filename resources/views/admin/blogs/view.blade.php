@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>View Blog Information
                </div>
                <div class="col-md-4 card_button_part">
                    <a href="{{url('dashboard/blogs')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Blogs</a>
                </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-bordered table-striped table-hover custom_view_table">
                      <tr>
                        <td>Blog Title</td>
                        <td>:</td>
                        <td>{{$data->blog_title}}</td>
                      </tr>
                      <tr>
                        <td>Blog Subtitle</td>
                        <td>:</td>
                        <td>{{$data->blog_subtitle}}</td>
                      </tr>
                      <tr>
                        <td>Blog Web</td>
                        <td>:</td>
                        <td>{{$data->blog_web}}</td>
                      </tr>
                      <tr>
                        <td>Blog Order</td>
                        <td>:</td>
                        <td>{{$data->blog_order}}</td>
                      </tr>
                      <tr>
                        <td>Blog Photo</td>
                        <td>:</td>
                        <td>
                          @if($data->blog_image!='')
                            <img class="img200"  src="{{asset('uploads/blogs/'.$data->blog_image)}}"/>
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
