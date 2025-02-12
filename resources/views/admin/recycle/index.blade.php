@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-sm-3 col-md-3">
     <div class="recycle_part_cont text-center">
         <h3>Recover Or Deleted </h3>
         <img  src="{{asset('contents/admin/images/recycle.jpg')}}"/>
         <div class="rcl_btn">
             <a href="{{url('dashboard/recycle/all')}}">View Users</a>
         </div>
     </div>
  </div>
  <div class="col-sm-3 col-md-3">
     <div class="recycle_part_cont text-center">
         <h3>Recover Or Deleted </h3>
         <img  src="{{asset('contents/admin/images/recycle.jpg')}}"/>
         <div class="rcl_btn">
             <a href="#">View Banner</a>
         </div>
     </div>
  </div>
  <div class="col-sm-3 col-md-3">
     <div class="recycle_part_cont text-center">
         <h3>Recover Or Deleted </h3>
         <img  src="{{asset('contents/admin/images/recycle.jpg')}}"/>
         <div class="rcl_btn">
             <a href="#">View Product</a>
         </div>
     </div>
  </div>
  <div class="col-sm-3 col-md-3">
     <div class="recycle_part_cont text-center">
         <h3>Recover Or Deleted </h3>
         <img  src="{{asset('contents/admin/images/recycle.jpg')}}"/>
         <div class="rcl_btn">
             <a href="#">View Contents</a>
         </div>
     </div>
  </div>
</div>
@endsection
