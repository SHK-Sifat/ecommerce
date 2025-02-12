<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class ProductController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    $all=Product::where('product_status',1)->orderBy('product_id','ASC')->get();
    return view('admin.product.all',compact('all'));
  }

  public function add(){
    return view('admin.product.add');
  }

  public function edit($slug){
    $data=Product::where('product_status',1)->where('product_slug',$slug)->firstOrFail();
    return view('admin.product.edit',compact('data'));
  }

  public function view($slug){
    $data=Product::where('product_status',1)->where('product_slug',$slug)->firstOrFail();
    return view('admin.product.view',compact('data'));
  }

  public function insert(Request $request){
    $this->validate($request,[
      'product_title'=> 'required|max:50',
      'product_details'=> 'required|max:400',
      'product_available'=> 'required',
      'product_newprice'=> 'required',
      'product_categori'=>'required',
      'protype'=>'required',
      'product_image'=>'required',
    ],[
      'product_title.required'=>'Please enter your product title.',
      'product_details.required'=>'Please enter your product details.',
      'product_newprice.required'=>'Please choose product newprice.',
      'product_available.required'=>'Please choose product available.',
      'product_categori.required'=>'Please select product categori.',
      'protype.required'=>'Please select product type.',
      'product_image.required'=>'Please upload user product image.',
    ]);

      $slug='P'.uniqid(7);
      $creator=Auth::user()->id;
      $insert=Product::insertGetId([
        'product_title'=>$request->product_title,
        'product_details'=>$request->product_details,
        'product_discount'=>$request->product_discount,
        'product_available'=>$request->product_available,
        'product_oldprice'=>$request->product_oldprice,
        'product_newprice'=>$request->product_newprice,
        'product_fabric'=>$request->fabric,
        'product_ctions'=>$request->ctions,
        'product_sleeve'=>$request->sleeve,
        'product_origin'=>$request->origin,
        'product_categori'=>$request->product_categori,
        'product_type'=>$request->protype,
        'product_slug'=>$slug,
        'product_creator'=>$creator,
        'created_at'=>Carbon::now()->toDateTimeString()
      ]);

      if($request->hasFile('product_image')){
        $image=$request->file('product_image');
        $imageName=$insert.'_'.time().'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(250,250)->save(base_path('public/uploads/product/'.$imageName));

        Product::where('product_id',$insert)->update([
            'product_image'=>$imageName,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
    }

      if($insert){
        Session::flash('success','Product registrion success.');
        return redirect('dashboard/product/add');
      }else{
        Session::flash('error','Product registrion failed.');
        return redirect('dashboard/product/add');
      }

  }

  public function update(Request $request){
    $id=$request->id;
    $this->validate($request,[
      'product_title'=> 'required|max:50',
      'product_details'=> 'required|max:400',
      'product_available'=> 'required',
      'product_newprice'=> 'required',
      'product_categori'=>'required',
      'protype'=>'required',
      'product_image'=>'required',
    ],[
      'product_title.required'=>'Please enter your product title.',
      'product_details.required'=>'Please enter your product details.',
      'product_newprice.required'=>'Please choose product newprice.',
      'product_available.required'=>'Please choose product available.',
      'product_categori.required'=>'Please select product categori.',
      'protype.required'=>'Please select product type.',
      'product_image.required'=>'Please upload user product image.',
    ]);

    $slug=$request->slug;
    $editor=Auth::user()->id;
    $update=Product::where('product_status',1)->where('product_id',$id)->update([
      'product_title'=>$request->product_title,
      'product_details'=>$request->product_details,
      'product_discount'=>$request->product_discount,
      'product_available'=>$request->product_available,
      'product_oldprice'=>$request->product_oldprice,
      'product_newprice'=>$request->product_newprice,
      'product_fabric'=>$request->fabric,
      'product_ctions'=>$request->ctions,
      'product_sleeve'=>$request->sleeve,
      'product_origin'=>$request->origin,
      'product_categori'=>$request->product_categori,
      'product_type'=>$request->protype,
      'product_slug'=>$slug,
      'product_editor'=>$editor,
      'created_at'=>Carbon::now()->toDateTimeString()
    ]);

    if($request->hasFile('product_image')){
      $image=$request->file('product_image');
      $imageName=$id.'_'.time().'.'.$image->getClientOriginalExtension();
      Image::read($image)->resize(250,250)->save(base_path('public/uploads/product/'.$imageName));

      Product::where('product_id',$id)->update([
          'product_image'=>$imageName,
          'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);
  }

    if($update){
      Session::flash('success','Product registrion success.');
      return redirect('dashboard/product/add');
    }else{
      Session::flash('error','Product registrion failed.');
      return redirect('dashboard/product/add');
    }

  }

  public function softdelete($id){
    $soft=Product::where('product_status',1)->where('product_id',$id)->update([
      'product_status'=>0,
      'updated_at'=>Carbon::now()->toDateTimeString(),
    ]);

    if($soft){
      Session::flash('success','successfully delete product information.');
      return redirect('dashboard/product');
    }else{
      Session::flash('error','please try again.');
      return redirect('dashboard/product');
    }
  }

  public function restore(){

  }

  public function delete(){

  }
}
