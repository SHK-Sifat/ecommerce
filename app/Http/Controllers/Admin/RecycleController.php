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

class RecycleController extends Controller{
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
    return view('admin.recycle.index');
  }

  public function all(){
    $all=User::where('status',0)->orderBy('id','ASC')->get();
    return view('admin.recycle.all',compact('all'));
  }

  public function restore(){
    $id=$_POST['modal_id'];
    $rstore=User::where('status',0)->where('id',$id)->update([
      'status'=>1,
      'updated_at'=>Carbon::now()->toDateTimeString(),
    ]);

    if($rstore){
      Session::flash('success','successfully restore user information.');
      return redirect('dashboard/recycle/all');
    }else{
      Session::flash('error','please try again.');
      return redirect('dashboard/recycle/all');
    }
  }

  public function delete(){
    $id=$_POST['modal_id'];
    $del=User::where('status',0)->where('id',$id)->delete([]);

    if($del){
      Session::flash('success','successfully delete user information.');
      return redirect('dashboard/recycle/all');
    }else{
      Session::flash('error','please try again.');
      return redirect('dashboard/recycle/all');
    }
  }
}
