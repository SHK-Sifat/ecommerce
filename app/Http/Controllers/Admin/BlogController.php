<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Blog;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class BlogController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $all=Blog::where('blog_status',1)->orderBy('blog_id','ASC')->get();
    return view('admin.blogs.all',compact('all'));
  }

    public function add(){
      return view('admin.blogs.add');
    }

    public function edit($slug){
      $data=Blog::where('blog_status',1)->where('blog_slug',$slug)->firstOrFail();
      return view('admin.blogs.edit',compact('data'));
    }

    public function view($slug){
      $data=Blog::where('blog_status',1)->where('blog_slug',$slug)->firstOrFail();
      return view('admin.blogs.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'blog_title'=> 'required',
        'blog_web'=> 'required',
        'blog_order'=>'required',
        'blog_image'=>'required',
      ],[
        'blog_title.required'=>'Please enter your blog title.',
        'blog_web.required'=>'Please enter your blog web.',
        'blog_order.required'=>'Please add blog order .',
        'blog_image.required'=>'Please upload user blog image.',
      ]);

        $slug='B'.uniqid(6);
        $creator=Auth::user()->id;
        $insert=Blog::insertGetId([
          'blog_title'=>$request->blog_title,
          'blog_subtitle'=>$request->blog_subtitle,
          'blog_web'=>$request->blog_web,
          'blog_order'=>$request->blog_order,
          'blog_slug'=>$slug,
          'blog_creator'=>$creator,
          'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('blog_image')){
          $image=$request->file('blog_image');
          $imageName=$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::read($image)->resize(250,250)->save(base_path('public/uploads/blogs/'.$imageName));

          Blog::where('blog_id',$insert)->update([
              'blog_image'=>$imageName,
              'updated_at'=>Carbon::now()->toDateTimeString(),
          ]);
      }

        if($insert){
          Session::flash('success','Blogs registrion success.');
          return redirect('dashboard/blogs/add');
        }else{
          Session::flash('error','Blogs registrion failed.');
          return redirect('dashboard/blogs/add');
        }
    }

    public function update(Request $request){
      $id=$request->id;
      $this->validate($request,[
        'blog_title'=> 'required',
        'blog_web'=> 'required',
        'blog_order'=>'required',
        'blog_image'=>'required',
      ],[
        'blog_title.required'=>'Please enter your blog title.',
        'blog_web.required'=>'Please enter your blog web.',
        'blog_order.required'=>'Please add blog order .',
        'blog_image.required'=>'Please upload user blog image.',
      ]);

      $slug=$request->slug;
      $editor=Auth::user()->id;
      $update=Blog::where('blog_status',1)->where('blog_id',$id)->update([
        'blog_title'=>$request->blog_title,
        'blog_subtitle'=>$request->blog_subtitle,
        'blog_web'=>$request->blog_web,
        'blog_order'=>$request->blog_order,
        'blog_slug'=>$slug,
        'blog_editor'=>$editor,
        'created_at'=>Carbon::now()->toDateTimeString()
      ]);

      if($request->hasFile('blog_image')){
        $image=$request->file('blog_image');
        $imageName=$id.'_'.time().'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(250,250)->save(base_path('public/uploads/blogs/'.$imageName));

        Blog::where('blog_id',$id)->update([
            'blog_image'=>$imageName,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
    }

      if($update){
        Session::flash('success','Blogs registrion success.');
        return redirect('dashboard/blogs');
      }else{
        Session::flash('error','Blogs registrion failed.');
        return redirect('dashboard/blogs/add');
      }
    }

    public function softdelete($id){
      $soft=Blog::where('article_status',1)->where('blog_id',$id)->update([
        'blog_status'=>0,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($soft){
        Session::flash('success','successfully delete blogs information.');
        return redirect('dashboard/blogs');
      }else{
        Session::flash('error','please try again.');
        return redirect('dashboard/blogs');
      }
    }

    public function restore(){

    }

    public function delete(){

    }

}
