<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class WebsiteCategoryController extends Controller{
    public function __construct(){}



    public function category($url){
      $cate=ProductCategory::where('procate_status',1)->where('procate_url',$url)->firstOrFail();
      return view('website.category.category',compact('cate'));
    }
}
