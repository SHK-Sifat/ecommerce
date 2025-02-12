<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{

    public function cart(){
      $cartItems = Cart::instance('cart')->content();
      return view('website.cart',['cartItems'=>$cartItems]);
    }
    public function addToCart(Request $request){
      $product=Product::find($request->id);
      $price=$product->product_newprice;
      Cart::instance('cart')->add($product->id,$product->product_title,$request->quantity,$price)->associate('App\Models\Product');
      return redirect()->back()->with('message','Item has been added successfully');
    }


}
