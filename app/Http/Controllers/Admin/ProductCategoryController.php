<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class ProductCategoryController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all=ProductCategory::where('procate_status',1)->orderBy('procate_id','ASC')->get();
      return view('admin.category.all',compact('all'));
    }

    public function add(){
      return view('admin.category.add');
    }

    public function edit($slug){
      $data=ProductCategory::where('procate_status',1)->where('procate_slug',$slug)->firstOrFail();
      return view('admin.category.edit',compact('data'));
    }

    public function view($slug){
      $data=ProductCategory::where('procate_status',1)->where('procate_slug',$slug)->firstOrFail();
      return view('admin.category.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'name'=>'required',
        'pic'=>'required',
        'icon'=>'required',
      ],[
        'name.required'=>'Please enter your category name',
        'pic.required'=>'Please upload category image',
        'icon.required'=>'Please upload category icon',
      ]);

      $slug='PC'.uniqid();
      $creator=Auth::user()->id;
      $url=Str::slug($request['name'],'-');
      $insert=ProductCategory::insertGetId([
        'procate_name'=>$request['name'],
        'procate_remarks'=>$request['remarks'],
        'procate_url'=>$url,
        'procate_slug'=>$slug,
        'procate_creator'=>$creator,
        'created_at'=>Carbon::now()->toDateTimeString()
      ]);

      if($request->hasFile('pic')){
        $image=$request->file('pic');
        $imageName=$insert.'_'.time().'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(250,250)->save(base_path('public/uploads/category/'.$imageName));

        ProductCategory::where('procate_id',$insert)->update([
            'procate_image'=>$imageName,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
    }
    if($request->hasFile('icon')){
      $image=$request->file('icon');
      $imageName=$insert.'_'.time().'.'.$image->getClientOriginalExtension();
      Image::read($image)->resize(250,250)->save(base_path('public/uploads/category/icon/'.$imageName));

      ProductCategory::where('procate_id',$insert)->update([
          'procate_icon'=>$imageName,
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
        'name'=>'required',
        'pic'=>'required',
        'icon'=>'required',
      ],[
        'name.required'=>'Please enter your category name',
        'pic.required'=>'Please upload category image',
        'icon.required'=>'Please upload category icon',
      ]);

      $slug=$request->slug;
      $editor=Auth::user()->id;
      $url=Str::slug($request['name'],'-');

      $update=ProductCategory::where('procate_status',1)->where('procate_id',$id)->update([
        'procate_name'=>$request['name'],
        'procate_remarks'=>$request['remarks'],
        'procate_url'=>$url,
        'procate_slug'=>$slug,
        'procate_editor'=>$editor,
        'created_at'=>Carbon::now()->toDateTimeString()
      ]);

      if($request->hasFile('pic')){
        $image=$request->file('pic');
        $imageName=$id.'_'.time().'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(250,250)->save(base_path('public/uploads/category/'.$imageName));

        ProductCategory::where('procate_id',$id)->update([
            'procate_Image'=>$imageName,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
    }

    if($request->hasFile('icon')){
      $image=$request->file('icon');
      $imageName=$id.'_'.time().'.'.$image->getClientOriginalExtension();
      Image::read($image)->resize(250,250)->save(base_path('public/uploads/category/icon/'.$imageName));

      ProductCategory::where('procate_id',$id)->update([
          'procate_icon'=>$imageName,
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
}
