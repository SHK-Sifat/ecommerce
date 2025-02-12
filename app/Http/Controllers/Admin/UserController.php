<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class UserController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all=User::where('status',1)->orderBy('id','ASC')->get();
      return view('admin.user.all',compact('all'));
    }

    public function add(){
      return view('admin.user.add');
    }

    public function view($slug){
      $data=User::where('status',1)->where('slug',$slug)->firstOrFail();
      return view('admin.user.view',compact('data'));
    }

    public function edit($slug){
      $data=User::where('status',1)->where('slug',$slug)->firstOrFail();
      return view('admin.user.edit',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[
        'name'=> 'required|max:50',
        'email'=> 'required|max:40|unique:users,email',
        'username'=> 'required',
        'password'=>'required|min:8',
        'password_confirmation' =>'required_with:password|same:password|min:8',
        'role'=>'required',
      ],[
        'name.required'=>'Please enter your name.',
        'email.required'=>'Please enter your email address.',
        'username.required'=>'Please choose username.',
        'role.required'=>'Please choose user role.',
      ]);


      $slug='U'.uniqid(3);
      $creator=Auth::user()->id;
      $insert=User::insertGetId([
        'name'=>$request->name,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'username'=>$request->username,
        'password'=>Hash::make($request->password),
        'role'=>$request->role,
        'slug'=>$slug,
        'creator'=>$creator,
        'created_at'=>Carbon::now()->toDateTimeString()
      ]);

      if($request->hasFile('pic')){
        $image=$request->file('pic');
        $imageName=$insert.'_'.time().'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(250,250)->save(base_path('public/uploads/users/'.$imageName));

        User::where('id',$insert)->update([
            'photo'=>$imageName,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
    }

      if($insert){
        Session::flash('success','user registrion success.');
        return redirect('dashboard/user/add');
      }else{
        Session::flash('error','user registrion failed.');
        return redirect('dashboard/user/add');
      }

    }

    public function update(Request $request){
      $id=$request->id;

      $this->validate($request,[
        'name'=>'required|max:50',
        'email'=>'required|max:40|unique:users,email,'.$id.',id',
        'username'=>'required',
        'role'=>'required',
      ],[
        'name.required'=>'Please enter your name',
        'email.required'=>'Please enter your email',
        'username.required'=>'Please enter your username',
        'role.required'=>'Please select your role',
      ]);


      $slug=$request->slug;
      $editor=Auth::user()->id;
      $update=User::where('status',1)->where('id',$id)->update([
        'name'=>$request->name,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'username'=>$request->username,
        'role'=>$request->role,
        'slug'=>$slug,
        'editor'=>$editor,
        'updated_at'=>Carbon::now()->toDateTimeString()
      ]);

      if($request->hasFile('pic')){
        $image=$request->file('pic');
        $imageName=$id.'_'.time().'.'.$image->getClientOriginalExtension();
        Image::read($image)->resize(250,250)->save(base_path('public/uploads/users/'.$imageName));

        User::where('id',$id)->update([
            'photo'=>$imageName,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
    }

      if($update){
        Session::flash('success','user update success.');
        return redirect('dashboard/user/add');
      }else{
        Session::flash('error','user update failed.');
        return redirect('dashboard/user/add');
      }

    }

    public function softdelete($id){
      $soft=User::where('status',1)->where('id',$id)->update([
        'status'=>0,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($soft){
        Session::flash('success','successfully delete user information.');
        return redirect('dashboard/user');
      }else{
        Session::flash('error','please try again.');
        return redirect('dashboard/user');
      }
    }

    public function restore(){

    }

    public function delete(){

    }
}
