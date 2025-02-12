<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Review;
use App\Models\Comment;
use Carbon\Carbon;
use Session;
use Auth;

class ProcessController extends Controller{
  public function __construct(){}
  public function index(){

  }

  public function review(Request $request){
        $this->validate($request,[
        'name'=>'required',
        'email'=>'required',
        ],[
        'name.required'=>'Please enter your name!',
        'email.required'=>'Please enter email address!',
        ]);
        $slug= uniqid('Rev');
        $insert=Review::insert([
          'review_name'=>$request->name,
          'review_email'=>$request->email,
          'review_message'=>$request->message,
          'review_slug' => $slug,
          'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
          Session::flash('success', 'Successfully send your query.');
          return redirect('contact');
          } else {
          Session::flash('error', 'Error! Please try again.');
          return redirect('contact');
        }
    }

    public function comment(Request $request){
          $this->validate($request,[
          'name'=>'required',
          'email'=>'required',
          ],[
          'name.required'=>'Please enter your name!',
          'email.required'=>'Please enter email address!',
          ]);
          $slug= uniqid('CMT');
          $insert=Comment::insert([
            'comment_name'=>$request->name,
            'comment_email'=>$request->email,
            'comment_message'=>$request->message,
            'comment_slug' => $slug,
            'created_at' => Carbon::now()->toDateTimeString(),
          ]);

          if ($insert) {
            Session::flash('success', 'Successfully send your comment.');
            return redirect('blogs');
            } else {
            Session::flash('error', 'Error! Please try again.');
            return redirect('blogs');
          }
      }
}
