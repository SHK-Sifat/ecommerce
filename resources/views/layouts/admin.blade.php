<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Sifat">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{asset('contents/admin/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin/css')}}/all.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin/css')}}/style.css">
  </head>
  <body>
    <header>
        <div class="container-fluid header_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-7"></div>
                <div class="col-md-3 top_right_menu text-end">
                    <div class="dropdown">
                      <button class="btn dropdown-toggle top_right_btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          @if(Auth::user()->photo!='')
                            <img class="img-fluid" src="{{asset('uploads/users/'.Auth::user()->photo)}}"/>
                          @else
                            <img class="img-fluid" src="{{asset('contents/admin/images/avatar.jpg')}}"/>
                          @endif
                          {{Auth::user()->name}}
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-tie"></i> My Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Manage Account</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                      </ul>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </header>
    <section>
        <div class="container-fluid content_part">
            <div class="row">
                <div class="col-md-2 sidebar_part">
                    <div class="user_part">
                      @if(Auth::user()->photo!='')
                        <img class="img-fluid" src="{{asset('uploads/users/'.Auth::user()->photo)}}"/>
                      @else
                        <img class="img-fluid" src="{{asset('contents/admin/images/avatar.jpg')}}"/>
                      @endif
                        <h5>{{Auth::user()->name}}</h5>
                        <p><i class="fas fa-circle"></i> Online</p>
                    </div>
                    <div class="menu">

                        <ul>
                            <li><a href="{{url('dashboard')}}"> Dashboard</a></li>
                            <li><a href="{{url('dashboard/user')}}"> Users</a></li>
                            <li><a href="#"> Banner</a></li>
                            <li><a href="{{url('dashboard/product')}}"> Product</a></li>
                            <li><a href="{{url('dashboard/category')}}"> Category</a></li>
                            <li><a href="{{url('dashboard/article')}}">Articles</a></li>
                            <li><a href="{{url('dashboard/blogs')}}">Blogs</a></li>
                            <li><a href="{{url('dashboard/team')}}">Team</a></li>
                            <li><a href="{{url('dashboard/contact')}}">Contact Info</a></li>
                            <li><a href="#"> Contact Message</a></li>
                            <li><a href="{{url('dashboard/recycle')}}"> Recycle Bin</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"> Logout</a></li>
                        </ul>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="col-md-10 content">
                    <div class="row">
                        <div class="col-md-12 breadcumb_part">
                            <div class="bread">
                                <ul>
                                    <li><a href=""><i class="fas fa-home"></i>Home</a></li>
                                    <li><a href=""><i class="fas fa-angle-double-right"></i>Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container-fluid footer_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10 copyright">
                    <p>Copyright &copy; 2022 | All rights reserved by Dashboard | Development By <a href="#">Creative System Limited.</a></p>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </footer>
    <script src="{{asset('contents/admin/js')}}/jquery-3.7.1.min.js"></script>
    <script src="{{asset('contents/admin/js')}}/bootstrap.bundle.min.js"></script>
    <script src="{{asset('contents/admin/js')}}/custom.js"></script>
  </body>
</html>
