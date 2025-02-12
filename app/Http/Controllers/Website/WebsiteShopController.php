<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class WebsiteShopController extends Controller{
  public function __construct(){
  }

  public function shop(){
    return view('website.shop.shops');
  }

  public function details($slug){
      $product=Product::where('product_status',1)->where('product_slug',$slug)->firstOrFail();
      return view('website.shop.details',compact('product'));
    }
}
