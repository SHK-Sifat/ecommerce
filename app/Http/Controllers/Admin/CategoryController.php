<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Category;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class CategoryController extends Controller{

    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all=Category::where('category_status',1)->orderBy('category_id','ASC')->get();
      return view('admin.category.all',compact('all'));
    }

    public function add(){
      return view('admin.category.add');
    }

    public function edit($slug){
      $data=Category::where('category_status',1)->where('category_slug',$slug)->firstOrFail();
      return view('admin.category.edit',compact('data'));

    }

    public function view($slug){
      $data=Category::where('category_status',1)->where('category_slug',$slug)->firstOrFail();
      return view('admin.category.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'category'=>'required',
        'pic'=>'required',
      ],[
        'category.required'=>'Please enter your category name',
        'pic.required'=>'Please upload category image',
      ]);

      $slug='C'.uniqid();
      $creator=Auth::user()->id;
      $url=Str::slug($request['category'],'-');
      $insert=Category::insertGetId([
        'category_name'=>$request->category,
        'category_slug'=>$slug,
        'category_url'=>$url,
        'category_creator'=>$creator,
        'created_at'=>Carbon::now()->toDateTimeString()
      ]);

        if($request->hasFile('pic')){
          $image=$request->file('pic');
          $imageName=$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::read($image)->resize(250,250)->save(base_path('public/uploads/category/'.$imageName));

          Category::where('category_id',$insert)->update([
              'category_photo'=>$imageName,
              'updated_at'=>Carbon::now()->toDateTimeString(),
          ]);
      }
        if($insert){
          Session::flash('success','category registrion success.');
          return redirect('dashboard/category/add');
        }else{
          Session::flash('error','category registrion failed.');
          return redirect('dashboard/category/add');
        }

    }

    public function update(Request $request){
      $id=$request->id;

      $this->validate($request,[
        'category'=>'required|max:30',
        'pic'=>'required',
      ],[
        'category.required'=>'Please enter your category name',
        'pic.required'=>'Please upload category image',
      ]);


      $slug=$request->slug;
      $editor=Auth::user()->id;
      $url=Str::slug($request['category'],'-');
      $update=Category::where('category_status',1)->where('category_id',$id)->update([
        'category_name'=>$request->category,
        'category_slug'=>$slug,
        'category_url'=>$url,
        'category_editor'=>$editor,
        'updated_at'=>Carbon::now()->toDateTimeString()
      ]);

      if($request->hasFile('pic')){
        $image=$request->file('pic');
        $imageName=$id.'_'.time().'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(250,250)->save(base_path('public/uploads/category/'.$imageName));

        Category::where('category_id',$id)->update([
            'category_photo'=>$imageName,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
    }

      if($update){
        Session::flash('success','Category update success.');
        return redirect('dashboard/category/add');
      }else{
        Session::flash('error','Category update failed.');
        return redirect('dashboard/category/add');
      }
    }

    public function softdelete($id){
      $soft=Category::where('category_status',1)->where('category_id',$id)->update([
        'category_status'=>0,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($soft){
        Session::flash('success','successfully delete category information.');
        return redirect('dashboard/category');
      }else{
        Session::flash('error','please try again.');
        return redirect('dashboard/category');
      }
    }

    public function restore(){

    }

    public function delete(){

    }
}
