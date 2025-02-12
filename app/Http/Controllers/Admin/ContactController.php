<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Contact;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class ContactController extends Controller{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $all=Contact::where('contact_status',1)->orderBy('contact_id','ASC')->get();
      return view('admin.contact.all',compact('all'));
    }

    public function add(){
      return view('admin.contact.add');
    }

    public function edit($slug){
      $data=Contact::where('contact_status',1)->where('contact_slug',$slug)->firstOrFail();
      return view('admin.contact.edit',compact('data'));
    }

    public function view($slug){
      $data=Contact::where('contact_status',1)->where('contact_slug',$slug)->firstOrFail();
      return view('admin.contact.view',compact('data'));
    }

    public function insert(Request $request){
      $this->validate($request,[

      ],[

      ]);

        $slug='C'.uniqid(5);
        $creator=Auth::user()->id;
        $insert=Contact::insert([
          'contact_address'=>$request->contact_address,
          'contact_phone1'=>$request->contact_phone1,
          'contact_phone2'=>$request->contact_phone2,
          'contact_email'=>$request->contact_email,
          'contact_country'=>$request->contact_country,
          'contact_slug'=>$slug,
          'contact_creator'=>$creator,
          'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($insert){
          Session::flash('success','Contact registrion success.');
          return redirect('dashboard/contact/add');
        }else{
          Session::flash('error','Contact registrion failed.');
          return redirect('dashboard/contact/add');
        }
    }

    public function update(Request $request){

      $this->validate($request,[

      ],[

      ]);
        $id=$request->id;
        $slug=$request->slug;
        $editor=Auth::user()->id;
        $update=Contact::where('contact_status',1)->where('contact_id',$id)->update([
          'contact_address'=>$request->contact_address,
          'contact_phone1'=>$request->contact_phone1,
          'contact_phone2'=>$request->contact_phone2,
          'contact_email'=>$request->contact_email,
          'contact_country'=>$request->contact_country,
          'contact_slug'=>$slug,
          'contact_editor'=>$editor,
          'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($update){
          Session::flash('success','Contact Update success.');
          return redirect('dashboard/contact');
          Session::flash('error','Contact registrion failed.');
          return redirect('dashboard/contact/add');
        }
    }

    public function softdelete($id){
      $soft=Contact::where('contact_status',1)->where('contact_id',$id)->update([
        'contact_status'=>0,
        'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);

      if($soft){
        Session::flash('success','successfully delete contact information.');
        return redirect('dashboard/contact');
      }else{
        Session::flash('error','please try again.');
        return redirect('dashboard/contact');
      }
    }

}
