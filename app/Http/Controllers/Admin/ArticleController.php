<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Article;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class ArticleController extends Controller{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all=Article::where('article_status',1)->orderBy('article_id','ASC')->get();
      return view('admin.article.all',compact('all'));
    }

    public function add(){
      return view('admin.article.add');
    }

    public function edit($slug){
      $data=Article::where('article_status',1)->where('article_slug',$slug)->firstOrFail();
      return view('admin.article.edit',compact('data'));
    }

    public function view($slug){
      $data=Article::where('article_status',1)->where('article_slug',$slug)->firstOrFail();
      return view('admin.article.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'article_title'=> 'required',
        'article_web'=> 'required',
        'article_order'=>'required',
        'article_image'=>'required',
      ],[
        'article_title.required'=>'Please enter your article title.',
        'article_web.required'=>'Please enter your article web.',
        'article_order.required'=>'Please add article order .',
        'article_image.required'=>'Please upload user article image.',
      ]);

        $slug='A'.uniqid(4);
        $creator=Auth::user()->id;
        $insert=Article::insertGetId([
          'article_title'=>$request->article_title,
          'article_subtitle'=>$request->article_subtitle,
          'article_web'=>$request->article_web,
          'article_order'=>$request->article_order,
          'article_slug'=>$slug,
          'article_creator'=>$creator,
          'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('article_image')){
          $image=$request->file('article_image');
          $imageName=$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::read($image)->resize(250,250)->save(base_path('public/uploads/article/'.$imageName));

          Article::where('article_id',$insert)->update([
              'article_image'=>$imageName,
              'updated_at'=>Carbon::now()->toDateTimeString(),
          ]);
      }

        if($insert){
          Session::flash('success','Article registrion success.');
          return redirect('dashboard/article/add');
        }else{
          Session::flash('error','Product registrion failed.');
          return redirect('dashboard/article/add');
        }
    }

    public function update(Request $request){
      $id=$request->id;
      $this->validate($request,[
        'article_title'=> 'required',
        'article_web'=> 'required',
        'article_order'=>'required',
        'article_image'=>'required',
      ],[
        'article_title.required'=>'Please enter your article title.',
        'article_web.required'=>'Please enter your article web.',
        'article_order.required'=>'Please add article order .',
        'article_image.required'=>'Please upload user article image.',
      ]);

      $slug=$request->slug;
      $editor=Auth::user()->id;
      $update=Article::where('article_status',1)->where('article_id',$id)->update([
        'article_title'=>$request->article_title,
        'article_subtitle'=>$request->article_subtitle,
        'article_web'=>$request->article_web,
        'article_order'=>$request->article_order,
        'article_slug'=>$slug,
        'article_editor'=>$editor,
        'created_at'=>Carbon::now()->toDateTimeString()
      ]);

      if($request->hasFile('article_image')){
        $image=$request->file('article_image');
        $imageName=$id.'_'.time().'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(250,250)->save(base_path('public/uploads/article/'.$imageName));

        Article::where('article_id',$id)->update([
            'article_image'=>$imageName,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
    }

      if($update){
        Session::flash('success','Article registrion success.');
        return redirect('dashboard/article');
      }else{
        Session::flash('error','Article registrion failed.');
        return redirect('dashboard/article/add');
      }
    }

    public function softdelete($id){
      $soft=Article::where('article_status',1)->where('article_id',$id)->update([
        'article_status'=>0,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($soft){
        Session::flash('success','successfully delete article information.');
        return redirect('dashboard/article');
      }else{
        Session::flash('error','please try again.');
        return redirect('dashboard/article');
      }
    }

    public function restore(){

    }

    public function delete(){

    }
}
