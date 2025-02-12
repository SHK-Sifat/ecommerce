<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Team;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class TeamController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all=Team::where('team_status',1)->orderBy('team_id','ASC')->get();
      return view('admin.team.all',compact('all'));
    }

    public function add(){
      return view('admin.team.add');
    }

    public function edit($slug){
      $data=Team::where('team_status',1)->where('team_slug',$slug)->firstOrFail();
      return view('admin.team.edit',compact('data'));
    }

    public function view($slug){
      $data=Team::where('team_status',1)->where('team_slug',$slug)->firstOrFail();
      return view('admin.team.view',compact('data'));
    }


    public function insert(Request $request){
      $this->validate($request,[
        'team_name'=> 'required',
        'team_title'=> 'required',
        'team_facebook'=>'required',
        'team_linkedin'=>'required',
        'team_instagram'=>'required',
        'team_twitter'=>'required',
        'team_image'=>'required',
      ],[
        'team_name.required'=>'Please enter name.',
        'team_title.required'=>'Please enter title.',
        'team_facebook.required'=>'Please add facebook .',
        'team_linkedin.required'=>'Please add linkedin .',
        'team_instagram.required'=>'Please add instagram .',
        'team_twitter.required'=>'Please add twitter .',
        'team_image.required'=>'Please upload team image.',
      ]);

        $slug='T'.uniqid();
        $creator=Auth::user()->id;
        $insert=Team::insertGetId([
          'team_name'=>$request->team_name,
          'team_title'=>$request->team_title,
          'team_facebook'=>$request->team_facebook,
          'team_linkedin'=>$request->team_linkedin,
          'team_instagram'=>$request->team_instagram,
          'team_twitter'=>$request->team_twitter,
          'team_slug'=>$slug,
          'team_creator'=>$creator,
          'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('team_image')){
          $image=$request->file('team_image');
          $imageName=$insert.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::read($image)->resize(250,250)->save(base_path('public/uploads/team/'.$imageName));

          Team::where('team_id',$insert)->update([
              'team_image'=>$imageName,
              'updated_at'=>Carbon::now()->toDateTimeString(),
          ]);
      }

        if($insert){
          Session::flash('success','Team registrion success.');
          return redirect('dashboard/team/add');
        }else{
          Session::flash('error','Team registrion failed.');
          return redirect('dashboard/team/add');
        }
    }

    public function update(Request $request){
      $id=$request->id;
      $this->validate($request,[
        'team_name'=> 'required',
        'team_title'=> 'required',
        'team_facebook'=>'required',
        'team_linkedin'=>'required',
        'team_instagram'=>'required',
        'team_twitter'=>'required',
        'team_image'=>'required',
      ],[
        'team_name.required'=>'Please enter name.',
        'team_title.required'=>'Please enter title.',
        'team_facebook.required'=>'Please add facebook .',
        'team_linkedin.required'=>'Please add linkedin .',
        'team_instagram.required'=>'Please add instagram .',
        'team_twitter.required'=>'Please add twitter .',
        'team_image.required'=>'Please upload team image.',
      ]);

        $slug=$request->slug;
        $editor=Auth::user()->id;
        $update=Team::where('team_status',1)->where('team_id',$id)->update([
          'team_name'=>$request->team_name,
          'team_title'=>$request->team_title,
          'team_facebook'=>$request->team_facebook,
          'team_linkedin'=>$request->team_linkedin,
          'team_instagram'=>$request->team_instagram,
          'team_twitter'=>$request->team_twitter,
          'team_slug'=>$slug,
          'team_editor'=>$creator,
          'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('team_image')){
          $image=$request->file('team_image');
          $imageName=$id.'_'.time().'.'.$image->getClientOriginalExtension();
          Image::read($image)->resize(250,250)->save(base_path('public/uploads/team/'.$imageName));

          Team::where('team_id ',$id)->update([
              'team_image'=>$imageName,
              'updated_at'=>Carbon::now()->toDateTimeString(),
          ]);
      }

        if($update){
          Session::flash('success','Team registrion success.');
          return redirect('dashboard/team/view');
        }else{
          Session::flash('error','Team registrion failed.');
          return redirect('dashboard/team/add');
        }
    }

    public function softdelete($id){
      $soft=Team::where('team_status',1)->where('team_id',$id)->update([
        'team_status'=>0,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($soft){
        Session::flash('success','successfully delete Team information.');
        return redirect('dashboard/team');
      }else{
        Session::flash('error','please try again.');
        return redirect('dashboard/team');
      }
    }
}
