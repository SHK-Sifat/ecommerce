<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class WebsiteBlogController extends Controller{
  public function __construct(){

  }

  public function blogs(){
    return view('website.blogs.blogs');
  }

  public function details($slug){
    $data=Blog::where('blog_status',1)->where('blog_slug',$slug)->firstOrFail();
    return view('website.blogs.details',compact('data'));
  }

}
